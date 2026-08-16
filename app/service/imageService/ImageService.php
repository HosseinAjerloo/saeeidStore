<?php

namespace App\service\imageService;

use App\interface\ImageUploaderInterface;
use Illuminate\Http\UploadedFile;
use function PHPUnit\Framework\directoryExists;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService implements ImageUploaderInterface
{
    private UploadedFile $file;
    private string $width;
    private $rootPath = null;
    private $pathFile = null;
    private $name = null;
    private $resolveFilePaths = null;
    private $extension = null;
    private $basePath = null;


    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
        return $this;
    }

    public function getFile(): UploadedFile
    {
        return $this->file;
    }

    public function setRootPath(string $path)
    {
        $this->rootPath = $path;
        return $this;
    }

    public function getRootPath(): string
    {
        return $this->rootPath ?? date('Y/m/d', time());
    }

    public function setFilePath(string $path)
    {
        $this->pathFile = $path;
        return $this;
    }

    public function getFilePath(): string
    {
        return $this->pathFile ?? date('Y/m/d', time());
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name ?? time();
    }

    public function formatAble($path): string
    {
        $path = trim($path, ' /');
        return str_replace('/', DIRECTORY_SEPARATOR, $path);
    }

    public function resolveFilePaths()
    {
        $this->resolveFilePaths = $this->formatAble($this->getRootPath() . DIRECTORY_SEPARATOR . $this->getFilePath());
    }

    public function getResolveFilePaths(): string
    {
        return $this->resolveFilePaths;
    }

    public function setExtension(string $extension)
    {
        $this->extension = $extension;
        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension ?? $this->getFile()->getClientOriginalExtension();
    }

    public function makeFolder(string $path): void
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
    public function basePath(string $path){
        $this->basePath=$this->formatAble($path);
        return $this;
    }

    public function getBasePath():string{
        return $this->basePath??'';
    }

    public function generator()
    {
        $extension = $this->getExtension();
        $this->resolveFilePaths();
        $basePath=$this->getBasePath();
        $resolveFilePaths = $this->getResolveFilePaths(). DIRECTORY_SEPARATOR;
        $fileName = $this->getName();
        $finalName=$fileName . '.' . $this->getExtension();
        $finalRoute = $resolveFilePaths . $finalName;
        $finalPath =$basePath.DIRECTORY_SEPARATOR. $resolveFilePaths ;
        $roteSave=$finalPath.DIRECTORY_SEPARATOR.$finalName;

        $this->makeFolder($finalPath);
        $manager = new ImageManager(new Driver());
        $image = $manager->read($this->getFile());
//        $image->resize(800, 600);
        $image->save($roteSave);
        if (file_exists($roteSave))
            return $finalRoute;
        return false;

    }

    public function removeFile(string $path): bool
    {
        if (file_exists($path)) {
            unlink($path);
            return true;
        }
        return false;
    }

}
