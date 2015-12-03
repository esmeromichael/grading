<?php
namespace App\Http\Controllers\Deskpad;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Country;
use App\EntityType;
use Input;
use App\StudentInfo;
use App\Users;
use App\Subject;
use App\SubSubject;
use Response;
use App\SubjectType;
use App\ScoreHeader;
use App\ScoreDetail;

class PartnerController extends Controller {

public function partners() {
        $student = StudentInfo::paginate(10);
        $subsubjects = SubSubject::where('status', 'Active')->get();
        return view('deskpad/partners', compact('student','subsubjects'));
}

public function AddGrade() {

        $student = StudentInfo::all();
        $subsubjects = SubSubject::where('status', 'Active')->get();
         //return Response::json($subsubjects, 200, array(), JSON_PRETTY_PRINT);

        return view('deskpad/grade', compact('student','subsubjects'));
    }

public function AddSubject(){

    $subject = new Subject;
    $input= Input::except('_token');
    $subject->fill($input);
    $subject->save();

   return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Subject Successfully Added.');
}
public function AddSubSuject(){

    $subject = new SubSubject;
    $input= Input::except('_token');
    $subject->fill($input);
    $subject->save();

   return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Sub Subject Successfully Added.');

}

public function AddSetSuject(){
    $exam_type = count(Input::get('exam_type'));
    $subject_type = SubjectType::where('subject_id', Input::get('subject'))->first();
    $subsubjects = SubSubject::where('status', 'Active')->get();
        if($subject_type  == ""){
              if($exam_type > 0){
                    for($i=0;$i<$exam_type;$i++){
                        $exam = new SubjectType;
                        $exam->subject_id = Input::get('subject2');
                        $exam->sub_subject_id = Input::get('exam_type')[$i];
                        $exam->save();
                    }
                    return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Exam type added');
                }
        }
        else{
            if($subject_type->subject_id == Input::get('subject')){
                return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Exam type added');
            }
            else{
                if($exam_type > 0){
                    for($i=0;$i<$exam_type;$i++){
                        $exam = new SubjectType;
                        $exam->subject_id = Input::get('subject2');
                        $exam->sub_subject_id = Input::get('exam_type')[$i];
                        $exam->save();
                    }
                    return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Exam type added');
                }
            }
        }
}

public function SaveScore(){
    $student_info_id = count(Input::get('student_info_id'));

    $scoreheader = new ScoreHeader;
    $input= Input::except('_token');
    $scoreheader->fill($input);
    $scoreheader->save();

    if($student_info_id > 0){
        for($i=0;$i<$student_info_id;$i++){
            $scoredetail = new ScoreDetail;
            $scoredetail->student_info_id = Input::get('student_info_id')[$i];
            $scoredetail->subject_id = Input::get('subject_id');
            $scoredetail->sub_subject_id = Input::get('sub_subject_id');
            $scoredetail->score = Input::get('score')[$i];
            $scoredetail->save();
        }
    }
    return redirect()->action('Deskpad\PartnerController@partners')->with('message', 'Sucessfully Save.');
}

public function CreateScore(){
    $subject = new SubSubject;
    $input= Input::except('_token');
    $subject->fill($input);
    $subject->save();
}
public function CreateStudent() {
        $subsubjects = SubSubject::where('status', 'Active')->get();
		$Student= new StudentInfo;
        $input = Input::except('_token');
        $Student->fill($input);
		$Student->save();
        return view('deskpad/partners',compact('subsubjects'))->with('message', 'Student successfully added');
	}

public function login(){
        $email = Input::get('email');
        $password = Input::get('password');
        $subsubjects = SubSubject::where('status', 'Active')->get();
        $login = count(Users::where('email',$email)->where('password',$password)->first());
        if($login > 0){
            $user = Users::where('email',$email)->where('password',$password)->first();
            $user->status = 'Active';
            $user->save();

        return view('deskpad/partners',compact('user','subsubjects'))->with('message', 'Welcome');
        }
        else{
            return view('deskpad/baselogin')->with('message', 'Mismatch password and username! Please try again.');
        }
}

public function Studentlist(){

        $partners = StudentInfo::where('name', 'like', '%'.$name.'%')
                    ->where('supplier', 'Yes')
                    ->where('status', 'Active')->get();

        return Response::json($partners, 200, array(), JSON_PRETTY_PRINT);
    }
public function getSubject(){

        $subject = Subject::where('status', 'Active')->get();

        return Response::json($subject, 200, array(), JSON_PRETTY_PRINT);
    }

    public function getSubSubject(){
        $id = Input::get('id');
        $subsubject = SubSubject::where('id', $id)->get();

        return Response::json($subsubject, 200, array(), JSON_PRETTY_PRINT);
    }

    public function getExamType(){
        $id = Input::get('id');
        $subsubject = SubSubject::where('id', $id)->get();

        return Response::json($subsubject, 200, array(), JSON_PRETTY_PRINT);
    }

    public function StudentProfile($id){
        $profile = StudentInfo::where('id',$id)->first();
        return view('deskpad/studentprofile',compact('profile'));
    }
}
