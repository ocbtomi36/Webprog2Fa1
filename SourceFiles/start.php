   <?php require_once './protected/config/config.php'; ?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="<?= CHARSET; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" 
        integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <?php if(!empty(CSS)): 
            
            $countCss = count(CSS);
            
            ?>
        <?php for ($i=0; $i < $countCss; $i++):?>
        <link rel="stylesheet" type="text/css" href="<?= CSS_DIR.CSS[$i]?>">
        <?php endfor;?>
        <?php endif;?>
        <title>Welcome</title>
    </head>
    <body>
    <?php require VIEWS_DIR.'header.php';?>
    <main>
        <?php require PROTECTED_DIR.'content.php';?>
    </main>
    <?php require VIEWS_DIR.'footer.php'?>
</body>