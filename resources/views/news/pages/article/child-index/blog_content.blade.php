<!-- Blog Content -->
@php

@endphp
<div class="single-blog-wrapper">
    <div class="blog-img mb-30">
        <img src="{{ asset($item->thumb) }}" alt="">
    </div>
    <div class="blog-details-content">
        <h2>{{$item->name}}</h2>
        <div class="blog-meta">
            <ul>
                <li>May - 14.09.2018 </li>
                <li>
                    <a href="#"> 02 Comments</a>
                </li>
            </ul>
        </div>
    </div>
    {!! $item->content !!}
    <div class="blog-dec-tags-social">
        <div class="blog-dec-tags">
            <ul>
                <li><a href="#">Dog</a></li>
                <li><a href="#">Cat</a></li>
                <li><a href="#">Fish</a></li>
            </ul>
        </div>
        <div class="blog-dec-social">
            <span>share :</span>
            <ul>
                <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
