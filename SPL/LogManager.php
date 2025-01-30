<?php

class LogManager {
    private string $logDir;
    
    public function __construct(string $logDir = "logs") {
        $this->logDir = $logDir;
        
        // Cria o diretório se não existir
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0777, true);
        }
    }

    // Registra um evento no log
    public function log(string $message, string $type = "INFO"): void {
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $logFile = "{$this->logDir}/log_{$date}.log";

        $logEntry = "[$time] [$type] $message" . PHP_EOL;

        // Usando SPL para manipular arquivos
        $file = new SplFileObject($logFile, "a");
        $file->fwrite($logEntry);
    }

    // Lê os logs de um determinado dia
    public function readLogs(string $date): array {
        $logFile = "{$this->logDir}/log_{$date}.log";
        $logs = [];

        if (!file_exists($logFile)) {
            return ["Nenhum log encontrado para {$date}."];
        }

        $file = new SplFileObject($logFile, "r");
        while (!$file->eof()) {
            $line = $file->fgets();
            if (!empty(trim($line))) {
                $logs[] = $line;
            }
        }

        return $logs;
    }

    // Gera um relatório resumido dos logs
    public function generateReport(string $date): string {
        $logs = $this->readLogs($date);
        $report = [];

        // Usando um iterador SPL para manipular o array de logs
        $logIterator = new ArrayIterator($logs);

        foreach ($logIterator as $logEntry) {
            preg_match('/\[(.*?)\] \[(.*?)\] (.*)/', $logEntry, $matches);
            if (count($matches) === 4) {
                [, $time, $type, $message] = $matches;
                $report[$type][] = "[$time] $message";
            }
        }

        // Montando o relatório formatado
        $output = "=== RELATÓRIO DE LOG ({$date}) ===\n";
        foreach ($report as $type => $messages) {
            $output .= "\n**$type LOGS**\n";
            $output .= implode("\n", $messages) . "\n";
        }

        return $output;
    }
}

// 🔹 Exemplo de uso:

$logManager = new LogManager();

// Registrar alguns logs
$logManager->log("Sistema inicializado.");
$logManager->log("Usuário tentou acessar uma página restrita.", "WARNING");
$logManager->log("Erro ao conectar ao banco de dados.", "ERROR");
$logManager->log("Processo concluído com sucesso.");

// Gerar relatório para hoje
$date = date("Y-m-d");
echo $logManager->generateReport($date); 