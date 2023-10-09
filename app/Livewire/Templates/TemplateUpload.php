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

            // Store the uploaded HTML file in the "email_template" folder
            $path = $this->htmlFile->storeAs(
                'email_templates',
                $this->htmlFileName . '.html',
                'public'
            );
            // Save the tempalte name and directory in database.
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