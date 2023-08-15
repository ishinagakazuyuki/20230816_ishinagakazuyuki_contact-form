<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Rules\ZipcodeRule;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
        return view('livewire.add-source');
    }

    public $family = '';
    public $name = '';
    public $email = '';
    public $postcode = '';
    public $address = '';
    public $building_name = '';
    public $opinion = '';

    protected $rules = [
        'family' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'postcode' => ['required', 'postcode'],
        'address' => ['required', 'string', 'max:255'],
        'building_name' => ['string', 'max:255'],
        'opinion' => ['required', 'string', 'max:120'],
    ];
 
    protected $messages = [
        'family.required' => '苗字を入れてください。',
        'family.string' => '苗字を文字列で入れてください。',
        'family.max' => '苗字を255文字以下で入れてください。',
        'name.required' => '名前を入れてください。',
        'name.string' => '名前を文字列で入れてください。',
        'name.max' => '名前を255文字以下で入れてください。',
        'email.required' => 'メールアドレスを入れてください。',
        'email.string' => 'メールアドレスを文字列で入れてください。',
        'email.email' => '有効なメールアドレスを入れてください。',
        'email.max' => 'メールアドレスを255文字以下で入れてください。',
        'postcode.required' => '郵便番号を入れてください。',
        'address.required' => '住所を入れてください。',
        'address.string' => '住所を文字列で入れてください。',
        'address.max' => '苗字を255文字以下で入れてください。',
        'building_name.string' => '建物名を文字列で入れてください。',
        'building_name.max' => '建物名を255文字以下で入れてください。',
        'opinion.required' => 'ご意見を入れてください。',
        'opinion.string' => 'ご意見を文字列で入れてください。',
        'opinion.max' => 'ご意見を120文字以下で入れてください。',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function mount() {
        if (old('family')) {
	    $this->family = old('family');
        }
        if (old('name')) {
	    $this->name = old('name');
        }
        if (old('email')) {
	    $this->email = old('email');
        }
        if (old('postcode')) {
	    $this->postcode = old('postcode');
        }
        if (old('address')) {
	    $this->address = old('address');
        }
        if (old('building_name')) {
	    $this->building_name = old('building_name');
        }
        if (old('opinion')) {
	    $this->opinion = old('opinion');
        }
    }

    







}
