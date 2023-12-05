<?php

namespace App\Livewire\Business;

use App\Models\Avatars;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Aws\S3\S3Client;

class PhotoComponent extends Component
{

    #[Rule('required')]
    public $avatars;

    public $open = false;

    public function create()
    {
        $this->reset('avatars');
        $this->openModal();
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        set_time_limit(120);
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => '',
                'secret' => '',
            ],
        ]);
        if ($this->avatars) {
            foreach ($this->avatars as $avatar) {

                $name = $avatar->hashName();
                $route_path = $avatar->storeAs('event', $name, 'public');

                //  quitar background
                

                $avatarPath = storage_path('app/public/'.$route_path);

                $result = $s3->putObject([
                    'Bucket' => 'photos-software',
                    'Key' => 'events/' . $name,
                    'Body' => fopen($avatarPath, 'r'),
                    'ACL' => 'public-read',
                ]);

                $upload = $result['ObjectURL'];

                $createdPhoto = Avatars::create([
                    'route_path' => $upload,
                    "name" => $name,
                    'user_id' => auth()->user()->id,
                ]);

                $photos->push($createdPhoto);
            }
        }
    }

    public function render()
    {
        return view('livewire.business.photo-component');
    }
}
