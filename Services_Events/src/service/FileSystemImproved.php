<?php

namespace App\Service;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;



class FileSystemImproved

{    public $finder;
     public $filesystem;

     public function __construct( Filesystem $filesystem)
     {
        $this->filesystem = $filesystem;
        $this->finder  = new Finder() ;

        // if (!$this->filesystem->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi")) {
        //     $this->filesystem->mkdir(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi");
        // }
     }


public function createEmptyFile($filename ): Response
   
{ 
    $this->finder->directories()->in('../..')->name('web');
    foreach ( $this->finder as $f) {$contents = $f->getRealPath();}

    // if (!$filesystem->exists($filename) .'txt'){
       $this->filesystem->touch($contents.'/'.$filename);
   $message="new file created";
   return new Response($message);
// }

}


public function createFile( $filename , $text ): Response
{ 
    $this->finder->directories()->in('../..')->name('web');
    foreach ($this->finder as $f) {$contents = $f->getRealPath();}
    $this->filesystem->appendToFile($contents.'/'.$filename, $text );
     $message=$filename . ' is added with the text: ' . $text;
        return new Response($message);
}


public function removeFile(  $filename ): Response
{ 
    $this->finder->directories()->in('../..')->name('web');
    foreach ($this->finder as $f) {$contents = $f->getRealPath();}

    $src_dir_path = $contents.'/'.$filename;
    $this->filesystem->remove(['symlink', $src_dir_path , $filename]);
    $message="removed successfuly";
    return new Response($message);

}
}