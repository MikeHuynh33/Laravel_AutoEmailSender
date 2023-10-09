<?php

namespace App\Livewire\Templates;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class TemplateView extends Component
{
    public $listOfTemplate;
    public const DIRECTORY = 'email_templates';
    public function mount()
    {
        $directory = public_path(self::DIRECTORY);
        if (File::isDirectory($directory)) {
            $htmlFiles = File::files($directory);
            $htmlFiles = array_filter($htmlFiles, function ($file) {
                return $file->getExtension() === 'html';
            });
            $htmlFileNames = array_map(function ($file) {
                return $file->getFilename();
            }, $htmlFiles);
            $this->listOfTemplate = $htmlFileNames;
        } else {
            echo 'The directory does not exist.';
        }
    }
    public function render()
    {
        return view('livewire.templates.template-view');
    }
}