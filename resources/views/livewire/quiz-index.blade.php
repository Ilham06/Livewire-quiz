<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-12">
                <div class="card quiz-box shadow">
                    <div class="card-header">
                        <div class="head d-flex justify-content-between">
                            <p class="m-0">Pertanyaan ke {{ $question->number }} Dari 3</p>
                            <p wire:ignore class="m-0">Waktu Tersisa : <span class="timer"></span></p>
                        </div>

                        
                    </div>
                    <div class="card-body">
                        <p class="question mt-2 mb-3">{{ $question->body }}</p>
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
                    <div class="card-footer text-right">
                        <button wire:click="next()" class="btn btn-primary btn-sm">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var time = 120;

        window.livewire.on('answer', e => {
            alert(e['message'])
        });

        window.livewire.on('resetTimer', e => {
           time = 120; 
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

                if (time <= 10) {
                    el.style.color = 'red'
                }

                el.textContent = coundown
            } else {
                @this.next();
            }
        }, 1000)

        
    </script>
@endpush
