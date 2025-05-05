$.getJSON("http://ipinfo.io", function (data) {
  console.log("City: " + data.city + " ,County: " + data.country + " ,IP: " + data.ip + " ,Location: " + data.loc + " ,Organisation: " + data.org + " ,Postal Code: " + data.postal + " ,Region: " + data.region + "");

    <?php
    $handle = fopen("./log.txt", "a");

    $date = date(Y-m-d);
    $time = time();

    fwrite($handle, "{");
        fwrite($handle, "\t"."[".$date."]"."\r\n");
        fwrite($handle, "\t"."[".$time."]"."\r\n");
        fwrite($handle, "\t"."[".data.city."]"."\r\n");
        fwrite($handle, "Hi");
    ?>
});