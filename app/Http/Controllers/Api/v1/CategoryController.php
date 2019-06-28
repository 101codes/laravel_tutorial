<?php

namespace App\Http\Controllers\Api\v1;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $category, $date;
    public function __construct(Category $category){
        $this->category=$category;
        date_default_timezone_set('Asia/Phnom_Penh');
        $this->date=date("Y-m-d H:m:s");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->category->orderBy('order','ASC')->get();
        // $category=Category::all();
        return response()->json([
            "massage"=>"Read data successful",
            "data"=>$category,
            "status"=>200,
            "xhr"=>"rl"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->category->cat_name=$request->cat_name;
        $this->category->cat_name_kh=$request->cat_name_kh;
        $this->category->order=$request->order;
        $this->category->cat_description=$request->cat_description;
        try{
            $this->category->save();
            return response()->json([
                "message"=>"Category insert successfull"
            ]);
        }catch (\Exception $e) {
            return response()->json([
                "message"=>"Category cant' insert"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $id = preg_replace('#[^0-9]#','',$category->id);
        if($id != "" &&! empty($id)){
            $category = $this->category->where('id',$id)->first();
        }
        return response()->json([
            "message"=>"Show category successfull",
            "data"=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $cat_name=$request->cat_name;
        $cat_name_kh=$request->cat_name_kh;
        $order=$request->order;
        $status=$request->status;
        $cat_description=$request->cat_description;

        $category->cat_name=$cat_name;
        $category->cat_name_kh=$cat_name_kh;
        $category->order=$order;
        // $category->status=$status;
        // $category->cat_description=$cat_description;
        try{
            $category->save();
            return response()->json([
                "message"=>"Category update successfull",
            ]);
        }catch (\Exception $e) {
            return response()->json([
                "message"=>"Category cant' update"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id =  preg_replace('#[^0-9]#','',$category->id);
        try{
            $this->category->where('id',$id)->update([
                'status'                =>'0',
            ]);
            return response()->json([
                "message"=>"Category delete successfull",
            ]);
        }catch (\Exception $e) {
            return response()->json([
                "message"=>"Category cant' delete"
            ]);
        }
    }
}