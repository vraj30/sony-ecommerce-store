<html>
<body>
<table>
        <tr>
            <td id="categories">
                <h3>Categories</h3>
                <?php
                include "connection.php";
                $sql = "select * from categories";
                $result = mysqli_query($con, $sql);
                $res = mysqli_num_rows($result);
                $output = "";
                if ($res > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $output .= "<a id={$row['catID']} class='category' onclick='displayProducts(this.id)' >{$row['catName']}</a></br>";
                    }
                }
                echo $output;
                ?>
            </td>
            <td id="products">
                <?php
                $sql = "select * from products where catID=1";
                $result = mysqli_query($con, $sql);
                $res = mysqli_num_rows($result);
                $output = "";
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $output .= "<div style='display:flex;padding-left:20px;'><div class='product'>" . $row['prodName'] . "<br><br><img class='pics' alt='pics here' width='150' height='150' src='images/" . $row['image'] . "'><br>" . $row['price'] . "<br><br><button id=" . $row['prodID'] . " onclick='addcart(this)'>Add To Cart</button></div><br>";
                    }
                }
                echo $output;
                ?>
            </td>
    </table>
    </body>
    </html>