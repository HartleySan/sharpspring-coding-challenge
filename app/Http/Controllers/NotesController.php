<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Note;
    use App\Models\User;
    use App\Utils\Utils;
    use App\Utils\ViewUtils;

    class NotesController extends Controller {
        public function index() {
            $page = 'Notes';
            $user = User::get();

            $notes = $user->notes()->
                orderBy('created_at', 'desc')->
                orderBy('id', 'desc')->
                get()->
                map(function ($note) {
                    $note->created_at_formatted = date('D G:i', strtotime($note->created_at));
                    $note->time_diff = strtotime(now()) - strtotime($note->updated_at);

                    return $note;
                });

            return ViewUtils::getViewOrJson($page, [
                'notes' => $notes
            ]);
        }

        public function create() {
            $page = 'NotesForm';

            return ViewUtils::getViewOrJson($page);
        }

        public function store() {
            $data = Utils::getRequestData();
            $title = $data->title ?? null;
            $body = $data->body ?? null;

            if (isset($title, $body)) {
                $user = User::get();

                $note = new Note;
                $note->owner_id = $user->id;
                $note->title = strip_tags($title);
                $note->body = strip_tags($body);
                $note->save();

                return Utils::success();
            }

            return Utils::error('Please enter a valid title and body for the note.');
        }

        public function edit($id) {
            $note = Note::find($id);

            if ($note) {
                $page = 'NotesForm';

                return ViewUtils::getViewOrJson($page, [
                    'id' => $note->id,
                    'title' => $note->title,
                    'body' => $note->body,
                    'edit' => true
                ]);
            }

            return redirect('/notes');
        }

        public function update($id) {
            $note = Note::find($id);

            if ($note) {
                $data = Utils::getRequestData();
                $title = $data->title ?? null;
                $body = $data->body ?? null;

                if (isset($title, $body)) {
                    $note->title = strip_tags($title);
                    $note->body = strip_tags($body);
                    $note->save();

                    return Utils::success();
                }

                return Utils::error('Please enter a valid title and body for the note.');
            }
        }

        public function delete($id) {
            $note = Note::find($id);

            if ($note) {
                $note->delete();
            }
        }
    }