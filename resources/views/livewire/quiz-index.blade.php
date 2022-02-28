<div>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div wire:ignore class="head d-flex justify-content-between">
                            <p class="m-0">Pertanyaan ke {{ $question->number }}</p>
                            <p class="m-0">Waktu Tersisa : <span class="timer"></span></p>
                        </div>

                        <p class="mt-3 mb-0">{{ $question->body }}</p>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="answer()" action="">
                            @foreach ($question->answers as $answer)
                            <div class="form-check">
                                <input wire:model="answerSelected" class="form-check-input" type="radio" name="answer" id="{{ $answer->code }}" value="{{ $answer->code }}">
                                <label class="form-check-label" for="{{ $answer->code }}">
                                    {{ $answer->answer }}
                                </label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="card-footer">
                        <button wire:click="answer()" class="btn btn-success btn-sm mr-auto">Cek Answer</button>
                        <button wire:click="next()" class="btn btn-primary btn-sm mr-auto">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var time = 10;

        window.livewire.on('answer', e => {
            alert(e['message'])
        });

        window.livewire.on('resetTimer', e => {
           time = 10; 
        });

        var el = document.querySelector('.timer')

        
        timer = setInterval(function() {
            if(time > 0) {
                time--
                if (time > 60) {
                    var minute = Math.floor(time / 60)
                    var second = time % 60
                    var coundown = minute + ' menit ' + second + ' detik '
                } else {
                    var coundown = time + ' detik'
                }

                el.textContent = coundown
            } else {
                @this.next();
            }
        }, 1000)

        
    </script>
@endpush
