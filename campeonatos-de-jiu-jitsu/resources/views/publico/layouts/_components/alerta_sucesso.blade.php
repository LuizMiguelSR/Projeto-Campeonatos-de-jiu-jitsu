@if (session('sucess'))
<div x-data="{ show: true }" x-show="show" class="fixed bottom-4 end-4 mb-4 me-4">
    <div class="bg-green-500 text-white p-4 rounded shadow-md">
        <strong>{{ session('sucess') }}</strong>
        <button @click="show = false" type="button" class="float-end text-white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<script>
    // fecha o alerta após 3 segundos
    setTimeout(function() {
        document.querySelector('.fixed').remove();
    }, 3000);
</script>
@endif
