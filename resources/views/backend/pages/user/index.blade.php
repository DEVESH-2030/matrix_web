
@extends('backend.layouts.app')

@section('content')
    <div class="main-wrapper">
        <!-- ! Main -->
        <main class="main users chart-page" id="skip-target">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        
                        <h4 class="main-title">Users List	</h4>
                        <div class="users-table table-wrapper">
                            <table class="posts-table">
                                <thead>
                                    <tr class="users-table-info">
                                    <th>
                                        <label class="users-table__checkbox ms-20">
                                        <input type="checkbox" class="check-all">Image
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                        <td>
                                            <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="pages-table-img">
                                                <picture>
                                                    @if (auth()->user()->name == $user->name )
                                                    <i style="color:rgb(24, 170, 24);" class="fas fa-circle active-user-dot"></i>
                                                    @endif
                                                    <source srcset="{{ asset('img/avatar/avatar-illustrated-03.webp')}}" type="image/webp"><img src="{{ asset('img/avatar/avatar-illustrated-03.webp')}}" alt="User Name">
                                                </picture>
                                            </div>
                                            </label>
                                        </td>
                                        <td> {{ $user->name ?? ''}} </td>
                                        <td> {{ $user->email ?? '' }}</td>
                                        <td>
                                            @if (auth()->user()->name == $user->name )
                                            <span class="badge-active">Active</span>
                                            @else
                                            <span class="badge-disabled">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <span class="p-relative">
                                                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                                    <div class="sr-only">More info</div>
                                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                </button>
                                                <ul class="users-item-dropdown dropdown">
                                                    <li><a href="##">Edit</a></li>
                                                    <li><a href="##">Quick edit</a></li>
                                                    <li><a href="##">Trash</a></li>
                                                </ul>
                                            </span>
                                        </td>
                                        </tr>
                                    @empty
                                    No data availabel
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <article class="customers-wrapper">
                        <p class="customers__title"> &nbsp; Total Users {{ $users->count()}} available & user {{auth()->user()->id}} active
                        <p class="customers__date"> &nbsp; Today: {{  date('d/m/Y', strtotime(\Carbon\Carbon::now() ))}}</p>
                        <picture><source srcset="{{ asset('/img/svg/customers.svg') }}" type="image/webp"><img src="{{ asset('/img/svg/customers.svg') }}" alt=""></picture> 
                    </article>
                    <article class="white-block">
                        <div class="top-cat-title">
                        <h3>Top categories</h3>
                        <p>28 Categories, 1400 Posts</p>
                        </div>
                        <ul class="top-cat-list">
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Lifestyle <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Dailiy lifestyle articles <span class="purple">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Tutorials <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Coding tutorials <span class="blue">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Technology <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Dailiy technology articles <span class="danger">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                UX design <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                UX design tips <span class="success">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Interaction tips <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Interaction articles <span class="warning">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                App development <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Mobile development articles <span class="warning">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Nature <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Wildlife animal articles <span class="warning">+472</span>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="##">
                            <div class="top-cat-list__title">
                                Geography <span>8.2k</span>
                            </div>
                            <div class="top-cat-list__subtitle">
                                Geography articles <span class="primary">+472</span>
                            </div>
                            </a>
                        </li>
                        </ul>
                    </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection    