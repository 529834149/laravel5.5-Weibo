<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Handlers\ImageUploadHandler;
class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Topic $topic)
	{
            //预加载
            $res = $topic->withOrder($request->order);
            
            $topics = $topic->withOrder($request->order)->paginate(10);
//            $topics = Topic::with('user', 'category')->paginate(30);
//            return view('topics.index', compact('topics'));
//		$topics = Topic::paginate(30);
		return view('topics.index', compact('topics'));
	}

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Topic $topic)
    {
            $categories = Category::all();
            return view('topics.create_and_edit', compact('topic','categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        
            $topic->fill($request->all());
            $topic->user_id = Auth::id();
            $topic->save();
            return redirect()->route('topics.show', $topic->id)->with('message', '发表成功');
    }

    public function edit(Topic $topic)
    {
        $categories = Category::all();
        $this->authorize('update', $topic);
        return view('topics.create_and_edit', compact('topic','categories'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
            $this->authorize('update', $topic);
            $topic->update($request->all());

            return redirect()->route('topics.show', $topic->id)->with('message', '修改成功');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return redirect()->route('topics.index')->with('success', '成功删除！');
    }
    //实现文本编辑器中的图片上传
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}