<?php 

Class Upload 
{

    public function __construct(
        private object $db
    )
    {}


    /**
     * upload picture in uploads/products/ and return filename
     * 
     * @array $picture 
     * @return string $filename
     */
    public function UploadGamePicture (array $picture): string
    {

        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($picture['name']);

        $filename = $uploadFilename . '_' . Generate::randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;
        move_uploaded_file($picture['tmp_name'], $destination);

        return $filename;

    }


}