<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Platform;
use phpDocumentor\Reflection\Types\This;

class CoursesLesson extends Component
{

    public $section, $lesson, $platforms, $name, $platform_id=1, $url, $juego;
    protected $rules =[
        'lesson.name' => 'required',
        'lesson.platform_id'=>'required',
        'lesson.juego' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
    ];

    public function mount(Section $section){
        $this->section = $section;
        $this->platforms=Platform::all();
         $this->lesson = new Lesson();
    }
    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function edit(Lesson $lesson){
        $this->resetValidation();
        $this->lesson=$lesson;
    }

    public function update(){
        if($this->lesson->platform_id == 2){
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate();
     

        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->section = Section::find($this->section->id);

    }

    public function cancel(){
        $this->lesson = new Lesson();
    }

    public function store(){
        $rules =[
            'name' => 'required',
            'platform_id'=>'required',
            'juego' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        ];

        if($this->platform_id ==2){
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];

        }

        $this->validate($rules);

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'juego' => $this->juego,
            'section_id'=>$this->section->id
        ]);
        $this->reset(['name','platform_id','juego','url']);
        $this->section = Section::find($this->section->id);
    }

    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->section = Section::find($this->section->id);
    }
}
