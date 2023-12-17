<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Editor - Sport News Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.ckeditor.com/ckeditor5/40.2.0/decoupled-document/ckeditor.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <input class="display-3 border-0" type="text" name="title" id="title"
                    value="{{ $data['title'] ?? 'Article Title' }}">
            </div>
            <div class="col-xl-3">
                <a href="{{ route('journalist.posts') }}" class="btn btn-danger m-3">Back</a>
                <button class="btn btn-primary m-3" id="save">Publish</button>
            </div>
        </div>

        <!-- The toolbar will be rendered in this container. -->
        <div id="toolbar-container"></div>

        <!-- This container will become the editable. -->
        <div id="editor">
            @if (isset($data['body']))
                {!! $data['body'] !!}
            @else
                <p>Your words hold the power to captivate and inspire. What exciting sports narrative will you craft today, leaving our readers eager for more?</p>
            @endif
        </div>
    </div>
    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            DecoupledEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    const toolbarContainer = document.querySelector('#toolbar-container');

                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                    handleSave(editor);
                })
                .catch(error => {
                    console.error(error);
                });

            function handleSave(editor) {
                const saveButton = document.querySelector('#save');

                saveButton.addEventListener('click', () => {
                    const title = document.querySelector('#title').value;
                    const content = editor.getData();

                    const xhr = new XMLHttpRequest();
                    @if (isset($data['id']))
                        xhr.open('PUT', '{{ route('post.update', $data['id']) }}');
                    @else
                        xhr.open('POST', '{{ route('journalist.store') }}');
                    @endif
                    xhr.withCredentials = true;
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            @if (auth()->user()->role->id == 3)
                                window.location.href = '{{ route('admin.post') }}';
                            @else
                                window.location.href = '{{ route('journalist.posts') }}';
                            @endif
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    };
                    xhr.send(JSON.stringify({
                        id: {{ auth()->user()->id }},
                        title: title,
                        body: content
                    }));
                });
            }
        })
    </script>
</body>

</html>
