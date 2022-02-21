<h1>Easy Lover</h1>
<p>1,Először az egy országban lévőket mutatja meg</p>
<p>2,Utána a többit</p>
<p>Megadja hogy az adott személy milyen országban van.</p>
<code>echo $country->get_id();</code>
<p>Azok az ID-k ahol megegyezik az ország</p>
<code>SELECT compID FROM `companies` INNER JOIN towns ON towns.townID=companies.townID WHERE countryID LIKE "DEU"; </code>
<p>Utána jöhet a többi ami esetleg nem abban az országban van mint a soför</p>
<code>SELECT compID FROM `companies` INNER JOIN towns ON towns.townID=companies.townID WHERE countryID NOT LIKE "DEU";</code>
<?php
echo "Near List";
print_r($nearList);
echo "Other List";
print_r($otherList);
?>