<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.5/dist/tesseract.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Cropper.js CSS -->
<link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>

<!-- Cropper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>



<div id="image-edit-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
  <div class="min-w-[52svw] max-w-[60vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8 overflow-y-auto">

    <!-- Close Button -->
    <button id="imageEdit-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Abstract & Extracted Text Layout -->
        <div class="flex flex-col md:flex-row gap-6">

            <!-- Left Side -->
            <div class="flex-1 flex flex-col">
                <h2 class="text-xl font-bold text-[#575757] mb-3">Abstract</h2>

                <!-- Camera View / Captured Image -->
                <div id="camera-view" class="border border-[#575757] rounded-xl min-h-[30vh] max-h-[50vh] flex items-center justify-center mb-4 relative overflow-hidden">
                <!-- Live Camera Feed -->
                <video id="webcam" autoplay playsinline class="absolute inset-0 w-full h-full object-contain z-0"></video>

                <!-- Captured Image (Initially hidden) -->
                <img id="capturedImage" class="absolute inset-0 w-full h-full object-contain z-10 hidden" alt="Captured">

                <!-- Overlay (e.g. loading or spinner if needed) -->
                </div>

                <!-- Camera Control Buttons -->
                <div class="flex flex-wrap justify-between gap-2 mb-3">
                  <button id="openCameraBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-all">Open Camera</button>
                  <select id="cameraSelect" class="border border-gray-300 rounded px-2 py-1"></select>
                  <label class="flex items-center space-x-2">
                      <input type="checkbox" id="flashToggle">
                      <span class="text-sm">Flash</span>
                  </label>
                  <button id="takePictureBtn" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-all hidden">Take Picture</button>
                  <button id="retakeBtn" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition-all hidden">Retake</button>
                </div>

                <!-- Sliders -->
                <div class="space-y-3">
                  <label for="bwSlider" class="text-sm font-medium text-[#575757]">Contrast Threshold</label>
                  <input type="range" id="bwSlider" min="0" max="255" value="80" class="w-full">
                </div>

                <!-- Crop Image Button -->
                <div class="flex justify-end mt-3">
                  <button id="cropImageBtn" class="bg-[#fffff0] text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] font-semibold px-4 py-2 rounded-lg hover:brightness-110 cursor-pointer transition-all duration-200">
                      Crop Image
                  </button>
                  <button id="extractTextBtn" class="bg-[#fffff0] text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] font-semibold px-4 py-2 rounded-lg hover:brightness-110 cursor-pointer transition-all duration-200">
                      Extract Text
                  </button>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex-1 flex flex-col">
                <h2 class="text-xl font-bold text-[#575757] mb-3">Extracted Text</h2>
                <div class="p-4 min-h-[30vh] max-h-[50vh] overflow-auto text-[#575757] bg-white border rounded">
                  <p class="text-sm font-medium mb-2"></p>
                  <textarea id="ocrInput" class="w-full text-sm min-h-[20vh] bg-transparent outline-none resize-none"></textarea>
                    <!-- Loading Spinner -->
                    <div id="loadingSpinner" class="text-center mt-3 d-none">
                      <div class="spinner-border text-primary" role="status"></div>
                      <p class="mt-2">Extracting text, please wait...</p>
                    </div>
                  <p class="text-sm font-medium mt-2"></p>
                </div>

                <!-- Add Text Button -->
                <div class="flex justify-end mt-3">
                  <button id="useTextBtn" class="bg-emerald-500 text-white px-4 py-2 rounded hover:bg-emerald-600 transition-all">Add Text to Form</button>
                </div>
            </div>
        </div>


        <!-- crop moda -->
        <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-[#fffff0] p-4 rounded-xl">
              <div class="modal-header border-0">
                <h5 class="modal-title text-xl font-bold text-[#575757]" id="cropModalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="w-full h-[60vh] overflow-auto border rounded">
                  <img id="imageToCrop" src="#" alt="To Crop" class="max-w-full max-h-full object-contain">
                </div>
              </div>

              <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmCropBtn" class="btn btn-warning">Crop</button>
              </div>
            </div>
          </div>
        </div>

  </div>
</div>



<script>
  document.addEventListener('DOMContentLoaded', () => {
    let videoStream = null;
    let currentTrack = null;
    let cropper = null;
    let originalImageDataUrl = "";

    const webcam = document.getElementById('webcam');
    const capturedImage = document.getElementById('capturedImage');
    const flashToggle = document.getElementById('flashToggle');
    const takePictureBtn = document.getElementById('takePictureBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const bwSlider = document.getElementById('bwSlider');

    let bwThreshold = parseInt(bwSlider.value, 10);


    populateCameraList();

    // === Populate Camera List ===
    async function populateCameraList() {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const videoDevices = devices.filter(d => d.kind === 'videoinput');
      const select = document.getElementById('cameraSelect');

      select.innerHTML = '';
      videoDevices.forEach((device, i) => {
        const option = document.createElement('option');
        option.value = device.deviceId;
        option.text = device.label || `Camera ${i + 1}`;
        select.appendChild(option);
      });
    }
    
    // === Auto-switch camera on dropdown change ===
    document.getElementById('cameraSelect').addEventListener('change', async () => {
      if (!videoStream) return; // only switch if camera is already open

      try {
        stopCamera(); // stop current stream

        const selectedDeviceId = document.getElementById('cameraSelect').value;

        videoStream = await navigator.mediaDevices.getUserMedia({
          video: {
            deviceId: { exact: selectedDeviceId },
            facingMode: 'environment',
            width: { ideal: 1920 },
            height: { ideal: 1080 }
          }
        });

        webcam.srcObject = videoStream;
        currentTrack = videoStream.getVideoTracks()[0];
        toggleFlashlight(); // re-apply flashlight if needed

      } catch (err) {
        console.error("Error switching camera:", err);
        alert("Failed to switch camera: " + err.message);
      }
    });

    // === Open Camera Button ===
    document.getElementById('openCameraBtn').addEventListener('click', async () => {
      stopCamera(); // Clean up if already open

      capturedImage.classList.add('hidden');
      webcam.classList.remove('hidden');
      takePictureBtn.classList.remove('hidden');
      retakeBtn.classList.add('hidden');

      try {
        // Step 1: request permission to access default camera
        const tempStream = await navigator.mediaDevices.getUserMedia({ video: true });
        tempStream.getTracks().forEach(track => track.stop()); // stop immediately

        // Step 2: repopulate camera list now that labels are available
        await populateCameraList();

        // Step 3: get selected device and open it
        const selectedDeviceId = document.getElementById('cameraSelect').value;

        videoStream = await navigator.mediaDevices.getUserMedia({
          video: {
            deviceId: { exact: selectedDeviceId },
            facingMode: 'environment',
            width: { ideal: 1920 },
            height: { ideal: 1080 }
          }
        });

        webcam.srcObject = videoStream;
        currentTrack = videoStream.getVideoTracks()[0];
        toggleFlashlight();

      } catch (err) {
        console.error("Failed to open camera:", err);

        if (err.name === 'NotAllowedError') {
          alert("Permission denied. Please allow camera access in your browser settings.");
        } else if (err.name === 'NotFoundError') {
          alert("No camera found. Please connect a webcam or check device permissions.");
        } else {
          alert("An unexpected error occurred: " + err.message);
        }
      }
    });

    // === Stop Camera ===
    function stopCamera() {
      if (videoStream) {
        videoStream.getTracks().forEach(t => t.stop());
        videoStream = null;
      }
    }

    // === Flashlight Toggle ===
    flashToggle.addEventListener('change', () => toggleFlashlight());

    function toggleFlashlight() {
      if (!currentTrack) return;

      const flashOn = flashToggle.checked;
      const capabilities = currentTrack.getCapabilities?.();

      if (capabilities?.torch) {
        currentTrack.applyConstraints({
          advanced: [{ torch: flashOn }]
        }).catch(e => {
          console.error("Torch error:", e);
          alert("Torch control failed.");
        });
      } else if (flashOn) {
        alert("Torch not supported on this device.");
      }
    }

    // === Take Picture ===
    takePictureBtn.addEventListener('click', () => {
      const canvas = document.createElement('canvas');
      canvas.width = webcam.videoWidth || 640;
      canvas.height = webcam.videoHeight || 480;

      const ctx = canvas.getContext('2d');
      ctx.drawImage(webcam, 0, 0, canvas.width, canvas.height);

      originalImageDataUrl = canvas.toDataURL('image/png');
      capturedImage.src = originalImageDataUrl;

      webcam.classList.add('hidden');
      capturedImage.classList.remove('hidden');

      takePictureBtn.classList.add('hidden');
      retakeBtn.classList.remove('hidden');

      applyBWFilter();
    });

    // === Retake Picture ===
    retakeBtn.addEventListener('click', async () => {
      document.getElementById('openCameraBtn').click();
    });

    // === Apply Black & White Filter ===
    bwSlider.addEventListener('input', () => {
      bwThreshold = parseInt(bwSlider.value, 10);
      applyBWFilter();
    });

    function applyBWFilter() {
      if (!originalImageDataUrl) return;

      const threshold = bwThreshold;
      const img = new Image();

      img.onload = () => {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;

        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);

        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const data = imageData.data;

        for (let i = 0; i < data.length; i += 4) {
          const avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
          const bw = avg > threshold ? 255 : 0;
          data[i] = data[i + 1] = data[i + 2] = bw;
        }

        ctx.putImageData(imageData, 0, 0);
        capturedImage.src = canvas.toDataURL('image/png');
      };

      img.src = originalImageDataUrl;
    }

    // === Crop Button ===
    document.getElementById('cropImageBtn').addEventListener('click', () => {
      openCropper(capturedImage.src);
    });

    // === Cropper ===
    function openCropper(imageSrc) {
      const img = document.getElementById('imageToCrop');
      img.src = imageSrc;

      const modalElement = document.getElementById('cropModal');
      const cropModal = new bootstrap.Modal(modalElement, {
        backdrop: false,
        keyboard: false
      });
      cropModal.show();

      modalElement.addEventListener('shown.bs.modal', () => {
        if (cropper) cropper.destroy();
        cropper = new Cropper(img, {
          aspectRatio: NaN,
          viewMode: 1,
          autoCropArea: 1,
          responsive: true,
        });
      }, { once: true });

      modalElement.addEventListener('hidden.bs.modal', () => {
        if (cropper) {
          cropper.destroy();
          cropper = null;
        }

        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
      }, { once: true });
    }

    // === Confirm Crop ===
    document.getElementById('confirmCropBtn')?.addEventListener('click', () => {
      if (!cropper) return;

      const croppedCanvas = cropper.getCroppedCanvas({ width: 640, height: 480 });
      const croppedDataURL = croppedCanvas.toDataURL('image/png');

      capturedImage.src = croppedDataURL;
      originalImageDataUrl = croppedDataURL;
      webcam.classList.add('hidden');
      capturedImage.classList.remove('hidden');

      const modalElement = document.getElementById('cropModal');
      const cropModal = bootstrap.Modal.getInstance(modalElement);
      cropModal.hide();
    });


    // == Extract Text==
    document.getElementById('extractTextBtn').addEventListener('click', () => {
      runOCR(document.getElementById('capturedImage').src);
    });

    function runOCR(imageDataUrl) {
      const spinner = document.getElementById('loadingSpinner');
      const ocrInput = document.getElementById('ocrInput');

      spinner.classList.remove('d-none');
      ocrInput.value = '';

      Tesseract.recognize(
        imageDataUrl,
        'eng',
        {
          logger: m => console.log(m)
        }
      ).then(({ data: { text } }) => {
        ocrInput.value = text.trim();
      }).catch(err => {
        console.error("OCR error:", err);
        ocrInput.value = "Error reading text.";
      }).finally(() => {
        spinner.classList.add('d-none');
      });
    }

  });
</script>