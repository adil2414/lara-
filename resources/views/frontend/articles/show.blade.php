<x-frontend :title="$article->heading" :article="$article">
    <div>
    <figure class="max-w-lg">
        @if(isset($article->meta['image_url']))
            <img class="h-auto max-w-2xl rounded-lg" src="{{$article->meta['image_url']}}" alt="image description">
        @else
            <!-- <img class="h-auto max-w-full rounded-lg" src="placeholder-url" alt="placeholder description"> -->
        @endif
        <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
            @if(isset($article->meta['description']))
                {{$article->meta['description']}}
            @else
                
            @endif
        </figcaption>
    </figure>


        <h1 class="sm:text-xl md:text-2xl mb-1 leading-tight">
            {{$article->heading}}
        </h1>
        <div class="text-slate-600 text-xs md:text-sm mb-3">
            Published {{$article->published_date_formatted}} on
            <a href="{{route('articles-by-category', $article->category->alias)}}"
               class="hover:text-blue-700 focus:outline-none focus:text-blue-700">
                {{$article->category->name}}
            </a>
            <span class="whitespace-nowrap">by <span class="text-slate-800">{{$article->user->name}}</span></span>
        </div>
        <div class="text-sm leading-relaxed md:text-lg article-content">
            {!! $article->htmlContent !!}
        </div>
        @if(!$article->keywords->isEmpty())
            <div class="my-3">
                <x-frontend.article.tags :keywords="$article->keywords"></x-frontend.article.tags>
            </div>
        @endif
    </div>

    @if(!$relatedArticles->isEmpty())
        <div class="mb-3 mt-5">
            <h2 class="border-b border-blue-300 text-xl md:text-2xl">
                More articles on
                <a href="{{route('articles-by-category', ['categoryAlias' => $article->category->alias])}}"
                   class="text-blue-400 hover:text-blue-600 focus:outline-none focus:text-blue-700">
                    {{$article->category->name}}
                </a>
            </h2>
            @foreach($relatedArticles as $relatedArticle)
                <x-frontend.article :article="$relatedArticle"></x-frontend.article>
            @endforeach
        </div>
    @endif

    @if($article->is_comment_enabled)
        <livewire:frontend.article.comments :article="$article"/>
    @endif

    <livewire:frontend.subscribe/>

    <x-code-highlighter-script/>

</x-frontend>
