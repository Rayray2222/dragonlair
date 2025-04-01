<?php
include('session/session_check.php');
include('include/header.php');


?>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Summernote CSS (for WYSIWYG editor) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<!-- jQuery (required for Bootstrap and Summernote) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS (includes jQuery and Bootstrap JavaScript) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .inner-wrapper {
        position: relative;
        height: calc(100vh - 3.5rem);
        transition: transform 0.3s;
    }

    @media (min-width: 992px) {
        .sticky-navbar .inner-wrapper {
            height: calc(100vh - 3.5rem - 48px);
        }
    }

    .inner-main,
    .inner-sidebar {
        position: absolute;
        top: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
    }

    .inner-sidebar {
        left: 0;
        width: 235px;
        border-right: 1px solid #cbd5e0;
        background-color: #fff;
        z-index: 1;
    }

    .inner-main {
        right: 0;
        left: 235px;
    }

    .inner-main-footer,
    .inner-main-header,
    .inner-sidebar-footer,
    .inner-sidebar-header {
        height: 3.5rem;
        border-bottom: 1px solid #cbd5e0;
        display: flex;
        align-items: center;
        padding: 0 1rem;
        flex-shrink: 0;
    }

    .inner-main-body,
    .inner-sidebar-body {
        padding: 1rem;
        overflow-y: auto;
        position: relative;
        flex: 1 1 auto;
    }

    .inner-main-body .sticky-top,
    .inner-sidebar-body .sticky-top {
        z-index: 999;
    }

    .inner-main-footer,
    .inner-main-header {
        background-color: #fff;
    }

    .inner-main-footer,
    .inner-sidebar-footer {
        border-top: 1px solid #cbd5e0;
        border-bottom: 0;
        height: auto;
        min-height: 3.5rem;
    }

    @media (max-width: 767.98px) {
        .inner-sidebar {
            left: -235px;
        }

        .inner-main {
            left: 0;
        }

        .inner-expand .main-body {
            overflow: hidden;
        }

        .inner-expand .inner-wrapper {
            transform: translate3d(235px, 0, 0);
        }
    }

    .nav .show>.nav-link.nav-link-faded,
    .nav-link.nav-link-faded.active,
    .nav-link.nav-link-faded:active,
    .nav-pills .nav-link.nav-link-faded.active,
    .navbar-nav .show>.nav-link.nav-link-faded {
        color: #3367b5;
        background-color: #c9d8f0;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #467bcb;
    }

    .nav-link.has-icon {
        display: flex;
        align-items: center;
    }

    .nav-link.active {
        color: #467bcb;
    }

    .nav-pills .nav-link {
        border-radius: .25rem;
    }

    .nav-link {
        color: #4a5568;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }
</style>






<<div class="container">
    <div class="main-body p-0">
        <div class="inner-wrapper">
            <!-- Inner sidebar -->
            <div class="inner-sidebar">
                <!-- Inner sidebar header -->
                <!-- New Discussion Button -->
                <div class="inner-sidebar-header justify-content-center" style="position: relative; z-index: 15;">
                    <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal"
                        data-target="#threadModal" style="position: relative; z-index: 20; margin-top: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus mr-2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        NEW DISCUSSION
                    </button>
                </div>
                <!-- /Inner sidebar header -->

                <!-- Inner sidebar body -->
                <div class="inner-sidebar-body p-0">
                    <div class="p-3 h-100" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -16px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper"
                                        style="height: 100%; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 16px;">
                                            <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                <a href="javascript:void(0)"
                                                    class="nav-link nav-link-faded has-icon active">All Threads</a>
                                                <a href="javascript:void(0)"
                                                    class="nav-link nav-link-faded has-icon">Popular this week</a>
                                                <a href="javascript:void(0)"
                                                    class="nav-link nav-link-faded has-icon">Popular all time</a>
                                                <a href="javascript:void(0)"
                                                    class="nav-link nav-link-faded has-icon">Solved</a>
                                                <a href="javascript:void(0)"
                                                    class="nav-link nav-link-faded has-icon">Unsolved</a>
                                                <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">No
                                                    replies yet</a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </div>
                </div>
                <!-- /Inner sidebar body -->
            </div>
            <!-- /Inner sidebar -->

            <!-- Inner main -->
            <div class="inner-main">
                <!-- Inner main header -->
                <div class="inner-main-header">
                    <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#"
                        data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                    <select class="custom-select custom-select-sm w-auto mr-1">
                        <option selected="">Latest</option>
                        <option value="1">Popular</option>
                        <option value="3">Solved</option>
                        <option value="3">Unsolved</option>
                        <option value="3">No Replies Yet</option>
                    </select>
                    <span class="input-icon input-icon-sm ml-auto w-auto">
                        <input type="text"
                            class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"
                            placeholder="Search forum" />
                    </span>
                </div>
                <!-- /Inner main header -->

                <!-- Inner main body -->

                <!-- Forum List -->
                <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    <div class="card mb-2">
                        <div class="card-body p-2 p-sm-3">
                            <div class="media forum-item">
                                <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                        class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                <div class="media-body">
                                    <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                            class="text-body">Realtime fetching data</a></h6>
                                    <p class="text-secondary">
                                        lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                    </p>
                                    <p class="text-muted"><a href="javascript:void(0)">drewdan</a> replied <span
                                            class="text-secondary font-weight-bold">13 minutes ago</span></p>
                                </div>
                                <div class="text-muted small text-center align-self-center">
                                    <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                    <span><i class="far fa-comment ml-2"></i> 3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">

                    </div>

                    <div class="card mb-2">

                    </div>
                    <div class="card mb-2">
                        <div class="card-body p-2 p-sm-3">
                            <div class="media forum-item">
                                <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                        class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                <div class="media-body">
                                    <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                            class="text-body">Create a delimiter field</a></h6>
                                    <p class="text-secondary">
                                        lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                    </p>
                                    <p class="text-muted"><a href="javascript:void(0)">jackalds</a> replied <span
                                            class="text-secondary font-weight-bold">12 hours ago</span></p>
                                </div>
                                <div class="text-muted small text-center align-self-center">
                                    <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 65</span>
                                    <span><i class="far fa-comment ml-2"></i> 10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">

                    </div>
                    <div class="card mb-2">

                    </div>
                    <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                        <li class="page-item disabled">
                            <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                        </li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                        <li class="page-item active"><span class="page-link">2</span></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item">
                            <a class="page-link has-icon" href="javascript:void(0)"><i
                                    class="material-icons">chevron_right</i></a>
                        </li>
                    </ul>
                </div>
                <!-- /Forum List -->

                <!-- Forum Detail -->
                <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                    <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse"
                        data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="media forum-item">
                                <a href="javascript:void(0)" class="card-link">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle"
                                        width="50" alt="User" />
                                    <small class="d-block text-center text-muted">Newbie</small>
                                </a>
                                <div class="media-body ml-3">
                                    <a href="javascript:void(0)" class="text-secondary">Mokrani</a>
                                    <small class="text-muted ml-2">1 hour ago</small>
                                    <h5 class="mt-1">Realtime fetching data</h5>
                                    <div class="mt-3 font-size-sm">
                                        <p>Hellooo :)</p>
                                        <p>
                                            I'm newbie with laravel and i want to fetch data from database in realtime
                                            for my dashboard anaytics and i found a solution with ajax but it dosen't
                                            work if any one have a simple solution it will be
                                            helpful
                                        </p>
                                        <p>Thank</p>
                                    </div>
                                </div>
                                <div class="text-muted small text-center">
                                    <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                    <span><i class="far fa-comment ml-2"></i> 3</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Forum Detail -->

                <!-- /Inner main body -->
            </div>
            <!-- /Inner main -->
        </div>

        <!-- Thread Modal -->
        <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form id="newThreadForm">
                        <div class="modal-header d-flex align-items-center bg-primary text-white">
                            <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="threadTitle">Title</label>
                                <input type="text" class="form-control" id="threadTitle" name="title"
                                    placeholder="Enter title" autofocus />
                            </div>
                            <div class="form-group">
                                <label for="threadContent">Content</label>
                                <textarea class="form-control summernote" id="threadContent" name="content"
                                    placeholder="Write your discussion..." style="display: none;"></textarea>
                            </div>
                            <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
                                <input type="file" class="custom-file-input" id="attachment" name="attachment"
                                    multiple />
                                <label class="custom-file-label" for="attachment">Attachment</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="postButton">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>


    <script>
        $(document).ready(function () {
            // Initialize Summernote editor for the thread content
            $('#threadContent').summernote({
                height: 200,  // Set the height of the editor
                placeholder: 'Write your discussion here...',
            });

            // Handle form submission (AJAX) when Post button is clicked
            $('#postButton').click(function () {
                var title = $('#threadTitle').val();  // Get the title of the thread
                var content = $('#threadContent').val();  // Get the content from the Summernote editor
                var formData = new FormData();  // Create a FormData object to send data

                // Validate title and content
                if (title === '' || content === '') {
                    alert('Title and content are required!');
                    return;  // Stop form submission if title or content is empty
                }

                // Append title and content to the form data
                formData.append('title', title);
                formData.append('content', content);

                // Append files if any
                var files = $('#attachment')[0].files;
                for (var i = 0; i < files.length; i++) {
                    formData.append('attachments[]', files[i]);
                }

                // Send AJAX request
                $.ajax({
                    url: 'create_thread.php',  // Server-side PHP script to handle the form data
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        // Optional: Show loading indicator or disable the button
                        $('#postButton').prop('disabled', true).text('Posting...');
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('Thread created successfully!');
                            $('#threadModal').modal('hide');  // Close the modal
                            // Optionally, you can reload the page or update the UI dynamically
                        } else {
                            alert('Error: ' + data.message);  // Show error message if thread creation fails
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('There was an error processing your request: ' + error);
                    },
                    complete: function () {
                        // Enable the button and reset its text
                        $('#postButton').prop('disabled', false).text('Post');
                    }
                });
            });
        });
    </script>