<style>
    #create:hover{
        background-image: linear-gradient(-45deg,#ff748c,#9799ba);
        transition: all 10s;
        border: none;
    }
    abbr{
        text-decoration: none;
    }
</style>
<abbr title="Note creation">
    <div class="h-12 w-12">
        <p class="flex justify-center small text-xs">Note</p>
        <a id="create" href="{{ url('note/create') }}" class="border border-gray-200  rounded-xl flex justify-center items-center h-12 w-12 text-3xl font-bold tracking-tight">
            <i class="bi bi-plus"></i>
        </a>
    </div>
</abbr>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">