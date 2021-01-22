<header class="z-40 absolute w-full bg-transparent py-10 ">    
    <div class="section text-white">
        <div class="container mx-auto">
            <div class="nav-top flex space-x-8">
                <h2 class="text-5xl">NeoCyber!</h2>
                <div class="flex-1 my-auto">
                    
                    <div @mouseenter="hoverenter" @mouseleave="hoverleave">
                        <span class="text-white ml-2">
                            Categories
                        </span>
                    <div>
                    <div>
                        @foreach ($categories as $category)
                            <a href="{{ route('category.product', [$category->id]) }}">
                                <span>{{$category->name ?? ''}}</span>
                            </a>
                        @endforeach
                    </div>
                    
                    {{-- <h4 class="text-white">Select a Category:
                    <select class="text-black ml-2" name="categories">
                        @foreach ($categories as $category)
                            <option value="{{ route('category.product', [$category->id]) }}">{{ $category->name ?? '' }}</option>
                        @endforeach
                    </select>
                    </h4> --}}
                </div>
                <button><i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
                <button><i class="fas fa-shopping-cart"></i>
                    Cart (0)
                </button>  
            </div>
        </div>
    </div>
</header>

{{-- <script>
    export default {
        data() {
            
        },
        methods: {
            hoverenter() {
                $category->id = true
            },
            hoverleave() {
                $category->id = false
            }
        }
    }
</script> --}}

<style>
    


</style>