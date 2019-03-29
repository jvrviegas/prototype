<?php ?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/cardapio.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {


            });
        </script>
        <style>
            .button {
                background-color: #008CBA; /* Green */
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }
            .numberArrow {
                background-color: #008CBA; 
                color: white; 
                border: 2px solid #008CBA;
                border-radius: 50%;
            }

            .numberArrow:hover {
                background-color: white;
                color: #008CBA;
            }
        </style>
    </head>
    <body>
        <div class="container table-responsive-sm">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>                    
                            <div>
                                <button type="button" class="button numberArrow" onclick="this.parentNode.querySelector('[type=number]').stepDown();">
                                    -
                                </button>

                                <input type="number" name="number" min="1" max="100" value="1" readonly>

                                <button type="button" class="button numberArrow" onclick="this.parentNode.querySelector('[type=number]').stepUp();">
                                    +
                                </button>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
