<html>
    <head>
        <style>
            .card_cont{
                background-color: rgba(187, 187, 187, 0.31);
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 20px;
            }
            .cont_card{
                width : 250px;
                display : inline-block;
                background-color: white;
                /* border: 0.1px solid grey; */
                border-radius: 2%;
                vertical-align:top;
                margin : 15px;
                padding : 20px;
                overflow: hidden;
            }

            .pdtimg img{
                
                display: block;
                margin : 0 auto;
                margin-top: 20px;
                margin-bottom: 20px;
                max-width :230px;
                max-height: 180px;    
            }

            .vendor{
                margin: 15px;
                text-align:center;
            }
            .buttons{
                display:flex;
                justify-content: space-evenly;
            }
            .buttons button{
                background-color:yellow;
                border: 1px solid yellow;
                border-radius:10px;
                margin top: 10px;
                width : 200px;
            }


        </style>
    </head>

</html>

<?php
include "authguard.php";
include "menu.html";

// $connection = new mysqli("localhost","root","","acme_proj",3306);
include "../shared/connection.php";

$sql_result = mysqli_query($connection , "select * from product join user on product.owner=user.userid");

echo "<div div class='card_cont'>";

while ($dbrow = mysqli_fetch_assoc($sql_result)){

    echo "
            <div class='cont_card'>
                <div><h4>$dbrow[name]</h4></div>
                <div>$dbrow[price]</div>
                <div>$dbrow[detail]</div>
                <div class='pdtimg'>
                    <img src= '$dbrow[imgpath]'>
                </div>
                <div class='vendor'>
                    Vendor : $dbrow[username]
                </div>
                
                <div class='buttons'>
                <a href = 'addcart.php?pid=$dbrow[pid]'>
                    <button>Add to Cart</button>
                </a>
                </div>
                  
            </div>";
}    

echo "</div>";

?>
