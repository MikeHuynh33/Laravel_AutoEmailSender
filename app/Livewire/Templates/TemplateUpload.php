<?php

namespace App\Livewire\Templates;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Storage;
class TemplateUpload extends Component
{
    use WithFileUploads;
    public $htmlFile;
    public $htmlFileName;
    public $fileContents = '';
    public $filePathReview;
    public $IframeReview = false;
    public function render()
    {
        return view('livewire.templates.template-upload');
    }
    public function uploadHtmlFile()
    {
        try {
            $this->validate([
                'htmlFileName' => 'required|string|max:50',
                'htmlFile' => 'required|file|mimes:html',
            ]);

            // Store the uploaded HTML file in the "email_templates" folder within the "public" disk
            $path = $this->htmlFile->storeAs(
                'email_templates',
                $this->htmlFileName . '.html',
                'public'
            );

            // Construct the destination path within the "resources/views/email_templates" directory
            $destinationPath = $this->htmlFileName . '.blade.php';
            // Because the mailable does not want to go in public to grab template , so I have created copy of html and store in resource/views/ and replaced the end with blade. view.
            $filePath = 'email_templates/' . $this->htmlFileName . '.html';
            $this->filePathReview = $filePath;
            $this->IframeReview = true;
            $fileContents = Storage::disk('public')->get($filePath);
            // Move the file from the "public" disk to the "resources/views/email_templates" directory
            Storage::disk('resources_views')->put(
                $destinationPath,
                $fileContents
            );
            EmailTemplate::create([
                'template_name' => $this->htmlFileName,
                'directory' => $path, // Store the file path
            ]);
            // Read the contents of the uploaded HTML file
            $this->fileContents = Storage::get($path);

            // reset the file input
            $this->htmlFile = null;

            // Flash a success message
            session()->flash('excelFile', 'HTML file uploaded successfully.');
        } catch (\Exception $e) {
            session()->flash('excelFile', $e);
        }
    }
}