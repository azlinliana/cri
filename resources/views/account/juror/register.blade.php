<x-guest-layout>
  <nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">
        <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="{{ route('index') }}">
          <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
            <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
            <path
              class="plane-take-off"
              d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
            />
          </svg>
          CRI
        </a>
      </div>

      <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black mr-4 lg:p-0 z-20" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block text-rose-300 no-underline hover:text-rose-200 hover:text-underline py-2 px-4" href="{{ route('index') }}">Home</a>
          </li>
        </ul>

        @if (Route::has('register'))
          <div id="navAction" class="mx-auto lg:mx-0 bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            @auth
              <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
              <a href="{{ route('login') }}">Login</a>
            @endauth
          </div>
        @endif
      </div>
    </div>    
  </nav>

  <section class="min-h-screen flex items-stretch">
    <div class="w-full bg-gray-200 min-h-screen">
      <div class="gradient h-96"></div>
      <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white dark:bg-gray-900 w-full shadow rounded p-8 sm:p-12 -mt-72">
          <p class="text-3xl uppercase font-bold leading-7 text-center text-gray-700 dark:text-white">Call for Judges</p>
          
          <p class="my-12 text-lg text-gray-700 text-justify border-double border-4 border-amber-300 py-4 px-4 rounded">
            If you wish to participate as a jury for the CRI 2023, please complete the following form by  9 May 2023. 
            Please ensure that the form is filled in accurately. 
            The honorarium and certificate of appointment will be given to all juries.
          </p>

          <form method="POST" action="{{ route('juror.register') }}" enctype="multipart/form-data" name="jurorRegisterForm">
            @csrf

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="-mx-3 md:flex mt-8 mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="title" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Title</label>

                <select id="title_user" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="title_user" :value="old('title_user')" required autofocus>
                  <option disabled selected>Pick your title</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                </select>
              </div>

              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="fullname" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Full Name</label>

                <input id="fullname" type="text" name="fullname" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your full name" :value="old('fullname')" required autofocus>
              
                <div class="text-sm italic text-gray-600 mt-1">**As per IC.</div>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="gender" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Gender</label>

                <select id="gender" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" :value="old('gender')" required autofocus>
                  <option disabled selected>Pick your gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>

              <div class="md:w-1/2 px-3">
                <label for="phone_number" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Phone Number</label>

                <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your phone number" :value="old('phone_number')" required autofocus>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label for="email" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Email</label>

                <input id="email" type="email" name="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your email" :value="old('email')" required autofocus>              
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0" x-data="{ show: true }">
                <label for="password" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Password</label>

                <label class="relative block">
                  <input id="password" 
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    placeholder="Password" 
                    :type="show ? 'password' : 'text'"
                    name="password"
                    required autofocus  
                  />
    
                  <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <i class="fa-regular fa-eye-slash" @click="show = !show" :class="{'hidden': !show, 'block':show }" style="color:black;"></i>
                    <i class="fa-regular fa-eye" @click="show = !show" :class="{'block': !show, 'hidden':show }" style="color:black;"></i>
                  </span>
                </label>
              </div>

              <div class="md:w-1/2 px-3" x-data="{ show: true }">
                <label for="confirm_password" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Confirm Password</label>

                <label class="relative block">
                  <input id="password_confirmation" 
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    placeholder="Confirm Password" 
                    :type="show ? 'password' : 'text'"
                    name="password_confirmation"
                    required autofocus  
                  />
    
                  <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <i class="fa-regular fa-eye-slash" @click="show = !show" :class="{'hidden': !show, 'block':show }" style="color:black;"></i>
                    <i class="fa-regular fa-eye" @click="show = !show" :class="{'block': !show, 'hidden':show }" style="color:black;"></i>
                  </span>
                </label>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="organization" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Organization</label>

                <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your organization" :value="old('organization')" required autofocus>
              </div>

              <div class="md:w-1/2 px-3">
                <label for="faculty" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Faculty</label>

                <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your faculty" :value="old('faculty')" required autofocus>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="field_of_study" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Field of Study</label>

                <input id="field_of_study" type="text" name="field_of_study" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your field of study" :value="old('field_of_study')" required autofocus>
              </div>
              
              <div class="md:w-1/2 px-3">
                <label for="expertise" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Expertise</label>

                <input id="expertise" type="text" name="expertise" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Your expertise" :value="old('expertise')" required autofocus>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label for="cv" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2" >Upload CV</label>

                <input id="cv" type="file" name="cv" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOC, DOCX (MAX. 5048).</p>
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label for="choosen_cluster" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2" >Clusters (Judging Preferences)</label>
                
                <div class="text-sm italic text-gray-600 mt-1 mb-3">**Maximum select three (3) clusters</div>

                <div class="flex">
                  <div>
                    @if ($clusters != null)
                      @foreach ($clusters as $cluster)
                        <div class="form-check mb-4">
                          <input type="checkbox" class="checkbox" value="{{ $cluster->id }}" name="judging_preference[]" onclick="checkSelection(0)" />

                          <label class="form-check-label inline-block text-gray-800 ml-3">
                            {{ $cluster->name }}
                          </label>
                        </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-4">
              <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-black hover:bg-opacity-80 focus:outline-none rounded-full">
                <p class="text-normal font-medium leading-none text-white">Register</p>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>