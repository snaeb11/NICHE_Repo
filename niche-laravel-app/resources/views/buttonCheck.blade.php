<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'My App' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fffff0] text-gray-900">
  <x-popups.action-successful-m/>
  <x-popups.backup-download-successful-m/>
  <x-popups.backup-successful-m/>
  <x-popups.confirm-delete-account-m/>
  <x-popups.confirm-delete-request-m/>
  <x-popups.import-excel-file-m/>
  <x-popups.export-file-m/>
  <x-popups.logout-m/>
  <x-popups.upload-thesis-m/>
  <x-popups.first-time-user-login/>
  <x-popups.forgot-pass-m/>
  <x-shared.sidebar />

  <div class="flex justify-center mt-10">

    <button id="open1" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      action
    </button>

     <button id="open2" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      backup download
    </button>

    <button id="open3" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      backup successful
    </button>

    <button id="open4" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      confirm delete account
    </button>

    <button id="open5" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      confirm delete request
    </button>

    <button id="open6" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      export file
    </button>

    <button id="open7" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      import restore file
    </button>

    <button id="open8" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      logout
    </button>

    <button id="open9" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      upload tite
    </button>

    <button id="open10" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      ftul
    </button>

    <button id="open11" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      fp
    </button>


  </div>
</body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const openBtn1 = document.getElementById('open1');
    const popup1 = document.getElementById('action-popup');

    const openBtn2 = document.getElementById('open2');
    const popup2 = document.getElementById('backup-download-popup');

    const openBtn3 = document.getElementById('open3');
    const popup3 = document.getElementById('backup-successful-popup'); 

    const openBtn4 = document.getElementById('open4');
    const popup4 = document.getElementById('confirm-delete-account-popup'); 

    const openBtn5 = document.getElementById('open5');
    const popup5 = document.getElementById('confirm-delete-request-popup'); 

    const openBtn6 = document.getElementById('open6');
    const popup6 = document.getElementById('export-file-popup'); 

    const openBtn7 = document.getElementById('open7');
    const popup7 = document.getElementById('import-excel-popup'); 

    const openBtn8 = document.getElementById('open8');
    const popup8 = document.getElementById('logout-popup');

    const openBtn9 = document.getElementById('open9');
    const popup9 = document.getElementById('upload-thesis-popup'); 

    const openBtn10 = document.getElementById('open10');
    const popup10 = document.getElementById('first-time-user-login-popup'); 

    const openBtn11 = document.getElementById('open11');
    const popup11 = document.getElementById('forgot-pass-popup'); 


    openBtn1.addEventListener('click', () => {
      popup1.style.display = 'flex';
    });

    openBtn2.addEventListener('click', () => {
      popup2.style.display = 'flex';
    });

    openBtn3.addEventListener('click', () => {
      popup3.style.display = 'flex';
    });

    openBtn4.addEventListener('click', () => {
      const step1 = document.getElementById('cda-step1');
      const step2 = document.getElementById('cda-step2');

      step1.classList.remove('hidden');
      step2.classList.add('hidden');
      popup4.style.display = 'flex';
    });

    openBtn5.addEventListener('click', () => {
      const step1 = document.getElementById('cdr-step1');
      const step2 = document.getElementById('cdr-step2');

      step1.classList.remove('hidden');
      step2.classList.add('hidden');
      popup5.style.display = 'flex';
    });

    openBtn6.addEventListener('click', () => {
      popup6.style.display = 'flex';
    });

    openBtn7.addEventListener('click', () => {
      const step1 = document.getElementById('ie-step-1');
      const step2 = document.getElementById('ie-step-2');

      step1.classList.remove('hidden');
      step2.classList.add('hidden');
      popup7.style.display = 'flex';
    });

    openBtn8.addEventListener('click', () => {
      popup8.style.display = 'flex';
    });

    openBtn9.addEventListener('click', () => {
      const step1 = document.getElementById('pt-step-1');
      const step2 = document.getElementById('pt-step-2');

      step1.classList.remove('hidden');
      step2.classList.add('hidden');
      popup9.style.display = 'flex';
    });

    openBtn10.addEventListener('click', () => {
      popup10.style.display = 'flex';
    });

    openBtn11.addEventListener('click', () => {
      const step1 = document.getElementById('fp-step1');
      const step2 = document.getElementById('fp-step2');

      step1.classList.remove('hidden');
      step2.classList.add('hidden');
      popup11.style.display = 'flex';
    });
    
  });
</script>

