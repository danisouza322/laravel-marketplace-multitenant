@extends('layouts.master')
@section('title') @lang('translation.Read_Email') @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Email @endslot
        @slot('title') Read Email @endslot
    @endcomponent

            <div class="row">
                <div class="col-12">
                    <!-- Left sidebar -->
                    <div class="email-leftbar card">
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#composemodal">
                            Compose
                        </button>
                        <div class="mail-list mt-4">
                            <a href="email-inbox.html" class="active"><i class="mdi mdi-email-outline font-size-16 align-middle me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
                            <a href="#"><i class="mdi mdi-star-outline font-size-16 align-middle me-2"></i>Starred</a>
                            <a href="#"><i class="mdi mdi-diamond-stone font-size-16 align-middle me-2"></i>Important</a>
                            <a href="#"><i class="mdi mdi-file-outline font-size-16 align-middle me-2"></i>Draft</a>
                            <a href="#"><i class="mdi mdi-email-check-outline font-size-16 align-middle me-2"></i>Sent Mail</a>
                            <a href="#"><i class="mdi mdi-trash-can-outline font-size-16 align-middle me-2"></i>Trash</a>
                        </div>

                        <h6 class="mt-4">Labels</h6>

                        <div class="mail-list mt-1">
                            <a href="#"><span class="mdi mdi-circle-outline text-info float-end"></span>Theme Support</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-warning float-end"></span>Freelance</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-primary float-end"></span>Social</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-danger float-end"></span>Friends</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-success float-end"></span>Family</a>
                        </div>

                        <h6 class="mt-4">Chat</h6>

                        <div class="mt-2">
                            <a href="#" class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <img class="rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="36">
                                </div>

                                <div class="flex-grow-1 chat-user-box overflow-hidden">
                                    <p class="user-title m-0 text-body">Scott Median</p>
                                    <p class="text-muted text-truncate">Hello</p>
                                </div>
                            </a>

                            <a href="#" class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <img class="rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="36">
                                </div>

                                <div class="flex-grow-1 chat-user-box overflow-hidden">
                                    <p class="user-title m-0 text-body">Julian Rosa</p>
                                    <p class="text-muted text-truncate">What about our next..</p>
                                </div>
                            </a>

                            <a href="#" class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <img class="rounded-circle" src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image" height="36">
                                </div>

                                <div class="flex-grow-1 chat-user-box overflow-hidden">
                                    <p class="user-title m-0 text-body">David Medina</p>
                                    <p class="text-muted text-truncate">Yeah everything is fine</p>
                                </div>
                            </a>

                            <a href="#" class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <img class="rounded-circle" src="assets/images/users/avatar-6.jpg" alt="Generic placeholder image" height="36">
                                </div>

                                <div class="flex-grow-1 chat-user-box overflow-hidden">
                                    <p class="user-title m-0 text-body">Jay Baker</p>
                                    <p class="text-muted text-truncate">Wow that's great</p>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="email-rightbar mb-3">

                        <div class="card">
                            <div class="btn-toolbar p-3" role="toolbar">
                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                </div>
                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Updates</a>
                                        <a class="dropdown-item" href="#">Social</a>
                                        <a class="dropdown-item" href="#">Team Manage</a>
                                    </div>
                                </div>
                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Updates</a>
                                        <a class="dropdown-item" href="#">Social</a>
                                        <a class="dropdown-item" href="#">Team Manage</a>
                                    </div>
                                </div>

                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        More <i class="mdi mdi-dots-vertical ms-2"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Mark as Unread</a>
                                        <a class="dropdown-item" href="#">Mark as Important</a>
                                        <a class="dropdown-item" href="#">Add to Tasks</a>
                                        <a class="dropdown-item" href="#">Add Star</a>
                                        <a class="dropdown-item" href="#">Mute</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="flex-shrink-0 me-3">
                                        <img class="rounded-circle avatar" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-14 my-1">Humberto D. Champion</h5>
                                        <small class="text-muted">support@domain.com</small>
                                    </div>
                                </div>

                                <h4 class="font-size-16">This Week's Top Stories</h4>

                                <p>Dear Lorem Ipsum,</p>
                                <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus convallis.
                                </p>
                                <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia lacus, vel tincidunt mi nibh sit amet lorem.</p>
                                <p>Sincerly,</p>
                                <hr/>

                                <div class="row">
                                    <div class="col-xl-2 col-6">
                                        <div class="card border shadow-none">
                                            <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                                            <div class="py-2 text-center">
                                                <a href="" class="fw-medium">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-6">
                                        <div class="card border shadow-none">
                                            <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                                            <div class="py-2 text-center">
                                                <a href="" class="fw-medium">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="javascript:void(0);" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                            </div>

                        </div>
                    </div>
                    <!-- card -->

                </div>
                <!-- end Col-9 -->

            </div>

            <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="To">
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="mb-3">
                                    <div id="email-editor"></div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/email-editor.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
