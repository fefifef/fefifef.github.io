<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <style>
            .item_left
            {
                grid-area: left; 
                border: solid 1px black;
                border-radius: 10px;
                float: left;
                width: 100%;
            }
            .item_right
            {
                grid-area: right; 
                border: solid 1px black;
                border-radius: 10px;
                width: 100%;
            }
            .grid-container 
            {
                display: grid;
                grid-template-areas:
                    'left right';
                grid-gap: 10px;
            }
            .grid-container > div 
            {
                background-color: rgba(255, 255, 255, 0.8);
                padding: 20px 0;
                font-size: 30px;
            }
        </style>
    </head>
    <body onload="sampleFunction()">
        <script language="javascript" src="script.js"></script>
        
        <div class="grid-container">
            <div class="item_left" id="block_left">
                HALLO
            </div>
            <div class="item_right" id="block_right">
                
            </div>
        </div>
    </body>
</html>