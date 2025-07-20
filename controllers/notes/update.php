<?php
use Core\App;
use Core\Database;
use Core\Validator;

$currentUserId = 1;
$db = App::getContainer()->resolve('Core\Database');
$errors = [];
$validator = new Validator();
// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['userId'] === $currentUserId);
// validate the form

if (!$validator->string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A Body of on more than 1,000 characters is required.";

}
// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}
$db->query('UPDATE notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();