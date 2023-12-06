<?php

namespace App\Livewire\Business;

use App\Models\Avatars;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Aws\S3\S3Client;

class PhotoComponent extends Component
{

    use WithFileUploads;

    #[Rule('required')]
    public $avatars;

    public $open = false;

    public function create()
    {
        $this->reset('avatars');
        $this->resetValidation();
        $this->openModal();
    }

    public function store(){
        $this->validate();
        set_time_limit(120);
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'AKIAVH5SIICA65BNQED7',
                'secret' => '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',
            ],
        ]);
        if ($this->avatars) {
            foreach ($this->avatars as $avatar) {

                $name = $avatar->hashName();
                $route_path = $avatar->storeAs('avatars', $name, 'public');

                //  quitar background
                
                $avatarPath = storage_path('app/public/'.$route_path);

                $result = $s3->putObject([
                    'Bucket' => 'fotografia-soft1',
                    'Key' => 'avatars/' . $name,
                    'Body' => fopen($avatarPath, 'r'),
                    'ACL' => 'public-read',
                ]);

                $upload = $result['ObjectURL'];

                $createdPhoto = Avatars::create([
                    'route_path' => $upload,
                    "name" => $name,
                    'user_id' => auth()->user()->id,
                ]);
            }
            session()->flash('success', 'Avatars uploaded successfully.');
            $this->reset('avatars');
            $this->resetValidation();
            $this->closeModal();
        }
    }

    public function delete($avatarId){
        Avatars::find($avatarId)->delete();
        session()->flash('success', 'Avatars deleted successfully.');
    }

    public function openModal(){
        $this->open = true;
    }

    public function closeModal(){
        $this->open = false;
        $this->resetValidation();
    }

    public function render()
    {
        $avatarsImg = Avatars::where('user_id', auth()->user()->id)->latest()->get();
        return view('livewire.business.photo-component', [
            'avatarsImg' => $avatarsImg
        ]);
    }
}
