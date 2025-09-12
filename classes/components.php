<?php
class pageLayout
{
    static function PageContent() {}
    static function pageHeader()
    {
        echo '<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAMANI HONEY</title>
    <link rel="icon" href="../css/ramani.jpeg">
    <link rel="stylesheet" href="../css/styles.css">
    </head> 
<body>';
    }

    static function pageNav()
    {
        echo
        '<div class="container-fluid">
    <div class="navbar">
    <ul>
    <li><a href="/">HOME</a></li>
    <li><a href="/shop">SHOP</a></li>
    <li><a href="/gallery">GALLERY</a></li>
    <li><a href="/blog">BLOG</a></li>
    </ul>
    </div>
    </div>
    ';
    }

    static function pageBody()
    {
        echo
        '<div class="pageBody"> ' .
            pageLayout::pageNav() .
            '<img src="../css/ramani.jpeg">' .
            '</div>';
    }

    static function pageFooter()
    {
        echo '</body>
</html>';
    }
}

class HomePage extends PageLayout
{
    static function HomePage()
    {
        pageLayout::pageHeader() .
            pageLayout::pageBody()   .
            pageLayout::pageFooter();
    }
}

class ShopPage extends pageLayout
{
    static function pageBody()
    {
        echo
        '<div class="pageBody"> ' .
            Shop::pageNav("RAMANI FARM SHOP") .
            Shop::PageContent() .
            '</div>';
    }
    static function ShopPage()
    {
        pageLayout::pageHeader() .
            ShopPage::pageBody()   .
            pageLayout::pageFooter();
    }
}

class GalleryPage extends pageLayout
{
    static function pageBody()
    {
        echo
        '<div class="pageBody"> ' .
            Gallery::pageNav("RAMANI FARM GALLERY") .
            Gallery::PageContent('beehive', '../css/ramani.jpeg', 'BEE HIVES') .
            Gallery::PageContent('harvestingEquipment', '../css/ramani.jpeg', 'HARVESTING EQUIPMENT') .
            Gallery::PageContent('farmGallery', '../css/ramani.jpeg', 'FARM GALLERY') .
            '</div>';
    }

    static function GalleryPage()
    {
        pageLayout::pageHeader() .
            GalleryPage::pageBody()   .
            pageLayout::pageFooter();
    }
}

class BlogPage extends pageLayout
{
    static function pageBody()
    {
        echo
        '<div class="pageBody">' .
            Blog::pageNav("ASALI CHRONICLES") .
            Blog::PageContent('WHERE DOES HONEY GET ITS SWEETNESS FROM', 'FROM NECTAR HARVESTED BY WORKER BEES', 'RAMANI HONEY', 'Aug 31 2025') .
            Blog::PageContent('CRYSTALLIZING HONEY', 'HONEY CRYSTALLIZES NATURALLY THROUGH NATURAL PROCESSES', 'RAMANI HONEY', 'Aug 31 2025') .
            '</div>';
    }
    static function BlogPage()
    {
        pageLayout::pageHeader() .
            BlogPage::pageBody()   .
            pageLayout::pageFooter();
    }
}

class Product
{
    static function Product(string $imagePath, $name, $weight, $price)
    {
        echo
        '<div class="productCard">
     <div class="productImage">
     <img src=' . $imagePath . ' alt="PRODUCT IMAGE">
     </div>
     <div class="productName">
     <p>' . $name . ' :: ' . $weight . '</p>
     </div>
     <div class="productPrice">
     <p>Ksh. ' . $price . '</p>
     </div>
     <div class="purchaseButton">
     <button class="btn">Add To Cart</button>
     </div>
     </div>';
    }
    static function ShoppingCart(string $name,string $weight,int $price,int $count)
    {
        echo
        '
        <div class="ShoppingCart">
            <div class="cartItems">
                <ul>
                    <li><i>PRODUCT NAME:</i> <b>' . $name . '</b></li>
                    <li><i>WEIGHT: </i><b>' . $weight . '</b></li>
                    <li><i>PRICE: </i><b>Ksh. ' . $price . '</b></li>
                    <li><i>COUNT: </i><b>' . $count . '</b></li>
                    <li><i>TOTAL: </i><b>Ksh. ' . $price * $count . '</b></li>
                    <li><button type="submit" value="">Confirm Purchase</button></li>
                </ul>
            </div>
        </div>
        ';
    }
    static function MakePurchase(){
        echo '<script>alert("Purchase Made!")</script>';
    }
}

class Honey extends Product {}
class GummyBear extends Product {}
class LemonHoneySweet extends Product {}

class Gallery
{
    static function pageNav(string $pageTitle)
    {
        echo
        '<div class="container-fluid">
        <div class="navbar">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/shop">SHOP</a></li>
                <li><a href="/gallery">GALLERY</a></li>
                <li><a href="/blog">BLOG</a></li>
            </ul>
        </div>
    </div>
    <div class="pageTitle">
    <p>' . $pageTitle . '</p>
    </div>';
    }
    static function GalleryCard(string $imagePath, string $about)
    {
        echo
        '<div class="galleryCard">
                <div class="galleryImage">
                <img src=' . $imagePath . ' alt="GALLERY IMAGE">
                </div>
                <div class="galleryText">
                <p>' . $about . '</p>
                </div>
        </div>';
    }
    static function PageContent(string $class, string $imagePath, string $about)
    {
        echo '<div class="gallerySection">';
        switch ($class) {
            case 'beehive':
                echo
                '<section class="beehive" id="beehive">'
                    . Gallery::GalleryCard($imagePath, $about)  .
                    '</section>';
                break;
            case 'harvestingEquipment':
                echo
                '<section class="harvestingEquipment" id="harvestingEquipment">'
                    . Gallery::GalleryCard($imagePath, $about) .
                    '</section>';
                break;
            case 'farmGallery':
                echo
                '<section class="farmGallery" id="farmGallery">'
                    . Gallery::GalleryCard($imagePath, $about) .
                    '</section>';
                break;
        }
        echo '</div>';
    }
}

class Shop
{
    static function pageNav(string $pageTitle)
    {
        echo '
    <div class="container-fluid">
    <div class="navbar">
    <ul>
    <li><a href="/">HOME</a></li>
    <li><a href="/shop">SHOP</a></li>
    <li><a href="/gallery">GALLERY</a></li>
    <li><a href="/blog">BLOG</a></li>
    </ul>
    </div>
    </div>
      <div class="pageTitle">
    <p>' . $pageTitle . '</p>
    </div>
    ';
    }
    static function PageContent()
    {
        Honey::Product('../css/ramani.jpeg', "RAMANI HONEY", "1KG", 800) . Honey::Product('../css/ramani.jpeg', "RAMANI HONEY", "500G", 450) . Honey::Product('../css/ramani.jpeg', "RAMANI HONEY", "250G", 250) .
            GummyBear::Product('../css/ramani.jpeg', "RAMANI GUMMY BEARS", "1KG", 900) . GummyBear::Product('../css/ramani.jpeg', "RAMANI GUMMY BEARS", "500G", 500) . GummyBear::Product('../css/ramani.jpeg', "RAMANI GUMMY BEARS", "250G", 300)
            . LemonHoneySweet::Product('../css/ramani.jpeg', "LEMON HONEY SWEETS", "1KG", 850);
    }
}

class Blog
{
    static function pageNav(string $pageTitle)
    {
        echo
        '<div class="container-fluid">
                    <div class="navbar">
                        <ul>
                            <li><a href="/">HOME</a></li>
                            <li><a href="/shop">SHOP</a></li>
                            <li><a href="/gallery">GALLERY</a></li>
                            <li><a href="/blog">BLOG</a></li>
                        </ul>
                    </div>
                 </div>
                <div class="pageTitle">
                    <p>' . $pageTitle . '</p>
                </div>';
    }
    static function Blog(string $blogTitle, string $blogContent, string $blogAuthor, string $publishDate)
    {
        echo
        '
        <div class="blog-container">
            <div class="blog">
            <div class="blogTitle">
            <p>' . $blogTitle . '</p>
            </div>
            <div class="blogContent">
            <article>' . $blogContent . '</article>
            </div>
            <div class="blogAuthor">
            <p>' . $blogAuthor . '</p>
            </div>
            <div class="publishDate">
            <p>' . $publishDate . '</p>
            </div>
            </div>
        </div>
        ';
    }

    static function PageContent(string $blogTitle, string $blogContent, string $blogAuthor, string $publishDate)
    {
        Blog::Blog($blogTitle, $blogContent, $blogAuthor, $publishDate);
    }
}

class Checkout extends pageLayout
{

    static function pageBody()
    {
        $conn = new HoneyDB();
        echo
        '<div class="pageBody"> ' .
            Shop::pageNav("CHECKOUT") .
            Product::ShoppingCart("RAMANI HONEY","1KG",800,5) .
            Product::ShoppingCart("RAMANI GUMY BEARS","500G",500,3) .
            $conn->HoneyDB() .
            '</div>';
    }
    static function Checkout()
    {
        echo
        pageLayout::pageHeader() .
            Checkout::pageBody() .
            pageLayout::pageFooter();
    }
}

class HoneyDB extends Config{
    function HoneyDB(){
        try{
            $conn = new Config();
            $pdo = new PDO("mysql:host=$conn->host;dbname=$conn->database",$conn->username,$conn->password);
            function getProducts($pdo){
                $stmt = $pdo->query();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                $productID = $product['productID'];
                $productName = $product['name'];
                $productPrice = $product['price'];
            }
        }
        catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}
class Config{
    protected $host = 'localhost';
    protected $database = 'HONEYDB';
    protected $username = 'jak';
    protected $password = 'At._.8080';
}