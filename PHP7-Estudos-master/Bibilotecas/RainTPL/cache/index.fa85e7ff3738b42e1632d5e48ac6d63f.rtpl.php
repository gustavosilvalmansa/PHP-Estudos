<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>Hello, <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>!</h1>

<p>How are you ?</p>
<p>You are using PHP Version <?php echo htmlspecialchars( $version, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>