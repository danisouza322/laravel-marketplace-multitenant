@extends('layouts.master')
@section('title') @lang('translation.Chat') @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('li_1') Apps @endslot
    @slot('title') Chat @endslot
    @endcomponent

            <div class="d-lg-flex">
                <div class="chat-leftsidebar card">
                    <div class="p-3 px-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" class="avatar-sm rounded-circle" alt="">
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Marcus <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                <p class="text-muted mb-0">Available</p>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown chat-noti-dropdown">
                                    <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Add Contact</a>
                                        <a class="dropdown-item" href="#">Setting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="search-box chat-search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <div class="chat-message-list" data-simplebar class="sidebar-menu-scroll">
                            <div class="p-4 border-top">
                                <div>
                                    <div class="float-end">
                                        <a href="" class="text-primary"><i class="mdi mdi-plus"></i> New Group</a>
                                    </div>
                                    <h5 class="font-size-16 mb-3"> Groups</h5>

                                    <ul class="list-unstyled chat-list group-list">
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                G
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-14 mb-0">General</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                D
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-14 mb-0">Designers</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                M
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-14 mb-0">Meeting</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-4 border-top">
                                <div>
                                    <div class="float-end">
                                        <a href="" class="text-primary"><i class="mdi mdi-plus"></i> New Contact</a>
                                    </div>
                                    <h5 class="font-size-16 mb-3"> Contacts</h5>

                                    <ul class="list-unstyled chat-list">
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="user-img online">
                                                            <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                                            <span class="user-status"></span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">John Howard</h5>
                                                        <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">02 min</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="unread">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <div class="user-img online">
                                                            <div class="avatar-sm align-self-center">
                                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                    G
                                                                </span>
                                                            </div>
                                                            <span class="user-status text-body"></span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Galen Rizo</h5>
                                                        <p class="text-truncate mb-0">I've finished it! See you so</p>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11 text-body">10 min</div>
                                                        <div class="unread-message">
                                                            <span class="badge bg-danger rounded-pill">01</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 align-self-center me-3">
                                                        <div class="user-img away">
                                                            <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                                            <span class="user-status"></span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Bernard Spencer</h5>
                                                        <p class="text-truncate mb-0">This theme is awesome!</p>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">22 min</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 align-self-center me-3">
                                                        <div class="user-img">
                                                            <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                                            <span class="user-status"></span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Annie Holder</h5>
                                                        <p class="text-truncate mb-0">Nice to meet you</p>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">01 Hr</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 align-self-center me-3">
                                                        <div class="user-img online">
                                                            <div class="avatar-sm align-self-center">
                                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                    V
                                                                </span>
                                                            </div>
                                                            <span class="user-status"></span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">Vernon Smith</h5>
                                                        <p class="text-truncate mb-0">Wow thats great</p>
                                                    </div>

                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">04 Hrs</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end chat-leftsidebar -->

                <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-3">
                    <div class="card">
                        <div class="p-3 px-lg-4 border-bottom">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <h5 class="font-size-16 mb-1 text-truncate"><a href="#" class="text-dark">Designers</a></h5>
                                    <p class="text-muted text-truncate mb-0">12 Members</p>
                                </div>
                                <div class="col-md-8 col-6">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-search"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                    <form class="p-2">
                                                        <div>
                                                            <input type="text" class="form-control rounded" placeholder="Search...">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>


                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Profile</a>
                                                    <a class="dropdown-item" href="#">Archive</a>
                                                    <a class="dropdown-item" href="#">Muted</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="px-lg-2">
                            <div class="chat-conversation p-3" data-simplebar>
                                <ul class="list-unstyled mb-0">
                                    <li class="chat-day-title">
                                        <div class="title">Today</div>
                                    </li>
                                    <li>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">John Howard</a> <span class="d-inline-block font-size-12 text-muted time">10:00 AM</span></h5>
                                                    <p class="mb-0">
                                                        Good morning everyone !
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Marcus</a> <span class="d-inline-block font-size-12 text-muted time">10:02 AM</span></h5>
                                                    <p class="mb-0">
                                                        Good morning everyone !
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                    <li>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Galen Rizo</a> <span class="d-inline-block font-size-12 text-muted time">10:04 AM</span></h5>
                                                    <p class="mb-0">
                                                        Hello!
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Galen Rizo</a> <span class="d-inline-block font-size-12 text-muted time">10:04 AM</span></h5>
                                                    <p class="mb-0">
                                                        What about our next meeting?
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                    <li>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">John Howard</a> <span class="d-inline-block font-size-12 text-muted time">10:06 AM</span></h5>
                                                    <p class="mb-0">
                                                        Next meeting tomorrow 10.00AM
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Marcus</a> <span class="d-inline-block font-size-12 text-muted time">10:02 AM</span></h5>
                                                    <p class="mb-0">
                                                        Wow that's great
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                    <li>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">John Howard</a> <span class="d-inline-block font-size-12 text-muted time">10:06 AM</span></h5>
                                                    <p class="mb-0">
                                                        img-1.jpg & img-2.jpg images for a New Projects
                                                    </p>

                                                    <ul class="list-inline message-img mt-3  mb-0">
                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1" href="">
                                                                <img src="{{ URL::asset('assets/images/small/img-1.jpg') }}" alt="" class="rounded img-thumbnail">
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1" href="">
                                                                <img src="{{ URL::asset('assets/images/small/img-2.jpg') }}" alt="" class="rounded img-thumbnail">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="p-3 chat-input-section">
                            <div class="row">
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" class="form-control chat-input rounded" placeholder="Enter Message...">

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
