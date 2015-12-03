<?php
namespace App\Http\Controllers\Search;
use App\Http\Controllers\Controller;
use Input;
use App\Partner;
use Response;
use App\PartnerBranch;
use App\Subject;
use App\SubSubject;
use App\SubjectType;
use App\StudentInfo;

class SearchDataController extends Controller {
	public function Supplierlist(){

		$name = Input::get('name');
		$partners = Partner::where('name', 'like', '%'.$name.'%')
					->where('supplier', 'Yes')
					->where('status', 'Active')->get();
		$data = ['supplier' => $partners];
		return Response::json($data, 200, array(), JSON_PRETTY_PRINT);
	}

	public function Branchlist(){

		$id =Input::get('id');
		$branch = PartnerBranch::where('partner_id', 'like', '%'.$id.'%')
						->where('status', 'Active')->get();

		return Response::json($branch, 200, array(), JSON_PRETTY_PRINT);
	}

	public function getSubject(){

        $subject = Subject::where('status', 'Active')->get();

        return Response::json($subject, 200, array(), JSON_PRETTY_PRINT);
    }

    public function getExamType(){
    	$id = Input::get('id');
        $subject = SubjectType::where('subject_id', $id)->with('sub_subject')->get();

        return Response::json($subject, 200, array(), JSON_PRETTY_PRINT);
    }

    public function getAllStudents(){
    	$studentlist = StudentInfo::where('status', 'Active')->get();
    	return Response::json($studentlist, 200, array(), JSON_PRETTY_PRINT);
    }

}