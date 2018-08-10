
<html>
<body>
<center><form method="GET">
<input id="name" type="text" name="search" placeholder="ENTER URL"><br><br>
<input type="submit">
</form>
</center>
</body>
<html>
<?php
if(isset($_GET['search'])){
	$name=$_GET['search'];
 @$html = file_get_contents($name);// for getting the htmlusing @ on starting to avoid warnings 
 $link= new DOMDocument();
libxml_use_internal_errors(TRUE);//disable libxml errors
if(!empty($html)){//check whether the html is returned or not
              $link->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$link_xpath = new DOMXPath($link);
	//get all the h2's with an id
	
         
          $discount_final=0;
          $name_val="UNTITLED";
          
            
    	$image = $link_xpath->query('//div[@id="imgTagWrapperId"]/img[@id="landingImage"]');
    	//$price =$link_xpath->query('//td[@class="a-span12 a-color-secondary a-size-base"]/span[@class="a-text-strike"]');
        $price =$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_saleprice"]');
        $price_deal=$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_dealprice"]');
        $our_price=$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_ourprice"]');
        $percent=$link_xpath->query('//tr[@id="dealprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
        $price_book=$link_xpath->query('//div[@id="soldByThirdParty"]/span[@class="a-size-medium a-color-price inlineBlock-display offer-price a-text-normal price3P"]');
        $image_books = $link_xpath->query('//img[@id="imgBlkFront"]');
        $percent_books=$link_xpath->query('//div[@id="buyNewInner"]/div[@id="buyBoxInner"]/ul[@class="a-unordered-list a-nostyle a-vertical"]/li/span[@class="a-list-item"]/span[@class="a-size-base a-color-secondary"]');
       $percent_t1=$link_xpath->query('//tr[@id="regularprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
       $name=$link_xpath->query('//span[@id="productTitle"]');
     function discount_calc($discount)
     {
    preg_match('/\([^\%]+/',$discount,$disc1);
    $disc_final=str_replace("(", "", $disc1);
    $disc_final_1=(int)$disc_final[0];
    return $disc_final_1;
     }  

     if($name->length>0)
     {
        $name_val=$name[0]->nodeValue;
     }
     if($image->length>0)
     {
        $image_src=$image[0]->getAttribute('src');
     }
    if($image_books->length>0)
     {
        $image_src=$image_books[0]->getAttribute('src');
     }
     if($price->length>0)
     {
        $price_val=$price[0]->nodeValue;
     }
     if($price_deal->length>0)
     {
        $price_val=$price_deal[0]->nodeValue;
     }
        if($our_price->length>0)
     {
        $price_val=$our_price[0]->nodeValue;
     }
    if($price_book->length>0)
     {
        $price_val=$price_book[0]->nodeValue;
     }
     if($percent->length>0)
     {
        $discount=$percent[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
    if($percent_books->length>0)
     {
        $discount=$percent_books[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
    if($percent_t1->length>0)
     {
        $discount=$percent_t1[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
     echo "NAME :".$name_val."<br>";
     echo "PRICE :".$price_val."<br>";
     echo "DISCOUNT: ".$discount_final." %"."<br>";
     echo "<img src='$image_src'>"."<br>";
;




    
























        
 
}

}    
?>
