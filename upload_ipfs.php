function uploadIPFS($file_path, $file_name, $file_name) {
    
    // API Setup
    $api_key        = "your_pinata_cloud_api_key";
    $api_secret     = "your_pinata_cloud_secret_key";
    $api_host       = "api.pinata.cloud";
    $api_endpoint   = "/pinning/pinFileToIPFS";

    // content for uploading
    $content_type = "multipart/form-data";
    
    $fp = $file_path; ## /path/to/file
    $fn = $file_name; ## give it a name
    $fm = $file_mime; ## example: image/png
    
    $data = new CURLFILE($fp, $fm,  $fn);
    $post_data = array("file" => $data, "name" => $fn, "wrapWithDirectory" => "false");

    // use cURL to post data to API
    $curl = curl_init('https://' . $api_host . $api_endpoint);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('pinata_api_key: $api_key', 'pinata_secret_api_key: $api_secret'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // cURL says.. 
    $api_response = curl_exec($curl);
    curl_close($curl);
    
    return $api_response;
  
}
