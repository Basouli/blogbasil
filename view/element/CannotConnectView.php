<div class="relative w-full lg:w-1/4 flex flex-col items-center space-y-16 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl text-4xl lg:text-sm">

  <!-- RESEND CONFIRMATION MAIL -->
  <a href="?c=Connexion&a=resendConfirmationMail" class="w-full flex flex-row justify-center items-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer p-8 lg:p-4 space-x-8 lg:space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>
      <p class="w-full text-center"><?php echo RESEND_CONFIRMATION_MAIL; ?></p>
  </a>

  <!-- CHANGE PASSWORD -->
  <a href="?c=Connexion&a=changePassword" class="w-full flex flex-row justify-center items-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer p-8 lg:p-4 space-x-8 lg:space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
      </svg>
      <p class="w-full text-center"><?php echo CHANGE_PASSWORD; ?></p>
  </a>

  <!-- SEND LOGIN -->
  <a href="?c=Connexion&a=sendLogin" class="w-full flex flex-row justify-center items-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer p-8 lg:p-4 space-x-8 lg:space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 lg:h-8 lg:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
      </svg>
      <p class="w-full text-center"><?php echo SEND_LOGIN; ?></p>
  </a>

</div>
