<div>
    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-12">
                @if ($status == 'start')
                    <div class="card quiz-box shadow">
                        <div class="card-header">
                            <div class="head d-flex justify-content-between">
                                <p class="m-0 w-600">Intruksi</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>1. Terdapat {{ $questionCount }} Pertanyaan</li>
                                <li>2. setiap pertanyaan diberi waktu {{ $countdown }} detik</li>
                                <li>3. jika waktu habis, akan lanjut pertanyaan berikutnya</li>
                                <li>4. tidak dapat kembali ke pertanyaan sebelumnya</li>
                                <li>5. Benar +1, Salah / Tidak dijawab 0.</li>
                            </ul>
                        </div>
                        <div class="card-footer text-right">
                            <button wire:click="start()" class="btn btn-primary btn-sm">Mulai</button>
                        </div>
                    </div>
                @endif
                @if ($status == 'in_progress')
                    <div class="card quiz-box shadow">
                        <div class="card-header">
                            <div class="head d-flex justify-content-between">
                                <p class="m-0">Pertanyaan ke <span class="w-500">{{ $question->number }}</span> Dari <span class="w-500">{{ $questionCount }}</span></p>
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
                @endif
                @if ($status == 'finish')
                    <div class="card quiz-box shadow">
                        <div class="card-body text-center">
                            <p class="m-0"> <span class="w-700">Quiz Selesai!</span> <br>Anda Mendapat Skor {{ $score }} Dari {{ $questionCount }}!.</p>
                        </div>
                        <div class="card-footer text-center border-0">
                            <button wire:click="restart()" class="btn btn-primary btn-sm">Mulai Ulanng</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@push('script')
    <script>
        
        
        window.livewire.on('startTimer', e => {

            var time = {{ $countdown }};
            var el = document.querySelector('.timer')

            window.livewire.on('resetTimer', e => {
               time = {{ $countdown }}; 
            });

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
        });

        
    </script>
@endpush
