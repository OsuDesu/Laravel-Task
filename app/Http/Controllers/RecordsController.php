<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordsController extends Controller
{
	public function edit($id)
	{
		$record = Record::find($id);

		if($record == NULL)
			return redirect('/');

		return view('record_edit', compact('record'));
	}

	public function update($id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:64',
	            	'author' => 'required|max:64',
		]);

		$record = Record::find($id);

		if($record == NULL)
			return redirect($request->url)->withErrors(['record_is_null' => 'Ошибка при обновлении. Указанная пластинка не найдена в базе']);

		$record->name = $request->name;
		$record->author = $request->author;
		$record->save();

		return redirect($request->url)->with('success', 'Информация о пластинке успешно обновлена');
	}

	public function delete($id)
	{
		$record = Record::find($id);

		if($record == NULL)
			return back();

		$record->delete();

		return back()->with('success', 'Пластинка успешно удалена');
	}
}
