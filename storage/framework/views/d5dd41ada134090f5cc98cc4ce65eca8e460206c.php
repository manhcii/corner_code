<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-5 col-lg-5">
                    <div class="contact-content">
                        <h1><?php echo e($page->title); ?></h1>
                        <p class="contact-des">
                            <?php echo e($page->description); ?>

                        </p>
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 4.00049H20C21.1046 4.00049 22 4.89592 22 6.00049V18.0005C22 19.1051 21.1046 20.0005 20 20.0005H4C2.89543 20.0005 2 19.1051 2 18.0005V6.00049C2 4.89592 2.89543 4.00049 4 4.00049ZM13.65 15.4505L20 11.0005V8.90049L12.65 14.0505C12.2591 14.3218 11.7409 14.3218 11.35 14.0505L4 8.90049V11.0005L10.35 15.4505C11.341 16.1432 12.659 16.1432 13.65 15.4505Z"
                                            fill="#769496" />
                                    </svg>
                                    <a href="mailto:hello@relume.io">hello@relume.io</a>
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 21.0003C15.3463 20.9988 13.7183 20.5901 12.26 19.8103L11.81 19.5603C8.70075 17.8886 6.15169 15.3395 4.48 12.2303L4.23 11.7803C3.42982 10.3137 3.00713 8.67097 3 7.00027V6.33027C2.99958 5.79723 3.21196 5.28607 3.59 4.91027L5.28 3.22027C5.44413 3.05487 5.67581 2.97515 5.90696 3.00453C6.13811 3.03391 6.34248 3.16907 6.46 3.37027L8.71 7.23027C8.93753 7.62316 8.87183 8.12003 8.55 8.44027L6.66 10.3303C6.50304 10.4855 6.46647 10.7253 6.57 10.9203L6.92 11.5803C8.17704 13.9087 10.0893 15.8175 12.42 17.0703L13.08 17.4303C13.275 17.5338 13.5148 17.4972 13.67 17.3403L15.56 15.4503C15.8802 15.1285 16.3771 15.0628 16.77 15.2903L20.63 17.5403C20.8312 17.6578 20.9664 17.8622 20.9957 18.0933C21.0251 18.3245 20.9454 18.5562 20.78 18.7203L19.09 20.4103C18.7142 20.7883 18.203 21.0007 17.67 21.0003H17Z"
                                            fill="#769496" />
                                    </svg>
                                    <a href="tel:+1(555)000-0000">+1 (555) 000-0000</a>
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0001 1.99951C8.00613 1.99951 4.75684 5.24881 4.75684 9.24271C4.75684 14.1993 11.2388 21.4758 11.5148 21.7831C11.774 22.0718 12.2266 22.0713 12.4854 21.7831C12.7613 21.4758 19.2433 14.1993 19.2433 9.24271C19.2432 5.24881 15.994 1.99951 12.0001 1.99951ZM12.0001 12.887C9.99062 12.887 8.35586 11.2522 8.35586 9.24271C8.35586 7.23326 9.99066 5.59849 12.0001 5.59849C14.0095 5.59849 15.6443 7.2333 15.6443 9.24275C15.6443 11.2522 14.0095 12.887 12.0001 12.887Z"
                                            fill="#769496" />
                                    </svg>
                                    <p>123 Sample St, Sydney NSW 2000 AU</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 col-lg-7">
                    <div class="contact-form">
                        <form class="form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" id="form-contact" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="is_type" value="contact" id="">
                            <div class="contact-form-row d-flex justify-content-between">
                                <div class="contact-form-line">
                                    <label for="name">First name</label>
                                    <input type="text" placeholder="Mike" name="json_params[name]" required />
                                </div>

                                <div class="contact-form-line">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" placeholder="Tran" name="json_params[lastname]" required />
                                </div>

                                <div class="contact-form-line">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="hungtran123@gmail.comcom" name="email"
                                        title="Email chưa đúng định dạng" required />
                                </div>

                                <div class="contact-form-line">
                                    <label for="phone">Phone</label>
                                    <input type="text" pattern="[0-9]{10,}$" placeholder="0913 123 456456"
                                        name="phone" title="Số điện thoại phải là số và có tối thiểu 10 ký tự" />
                                </div>

                                <div class="contact-form-line">
                                    <label for="country">Country</label>
                                    <div class="input-select position-relative">
                                        <select name="json_params[country]" id="seclect-country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">
                                                Antigua and Barbuda
                                            </option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">
                                                Bosnia and Herzegovina
                                            </option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cabo Verde">Cabo Verde</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Central African Republic">
                                                Central African Republic
                                            </option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czechia">Czechia</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">
                                                Dominican Republic
                                            </option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Holy See">Holy See</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="North Macedonia">North Macedonia</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">
                                                Papua New Guinea
                                            </option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="St. Vincent &amp; Grenadines">
                                                St. Vincent &amp; Grenadines
                                            </option>
                                            <option value="State of Palestine">
                                                State of Palestine
                                            </option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">
                                                Trinidad and Tobago
                                            </option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">
                                                United Arab Emirates
                                            </option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam" selected>Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        <div class="input-select-arrow position-absolute">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.8977 15.203C12.678 15.4226 12.3219 15.4226 12.1022 15.203L6.36739 9.46808C6.14772 9.24841 6.14772 8.89231 6.36739 8.67263L6.63256 8.40743C6.85222 8.18776 7.20838 8.18776 7.42805 8.40743L12.5 13.4794L17.5719 8.40743C17.7916 8.18776 18.1477 8.18776 18.3674 8.40743L18.6326 8.67263C18.8522 8.89231 18.8522 9.24841 18.6326 9.46808L12.8977 15.203Z"
                                                    fill="black" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="contact-form-line">
                                    <label for="postal">Postal Code</label>
                                    <input type="text" name="json_params[PostalCode]" placeholder="12 3333" />
                                </div>

                                <div class="contact-form-line contact-form-line-full">
                                    <label for="message">Message</label>
                                    <textarea name="content" cols="30" rows="10" placeholder="Type your message..."></textarea>
                                </div>

                                <div class="contact-form-line contact-form-line-full">
                                    <input type="checkbox" name="json_params[acceptprivacy]" />
                                    <label class="d-inline acceptprivacy" for="acceptprivacy">I accept the <a
                                            href="#" title="Terms of Use">Terms of Use</a></label>
                                </div>

                                <button type="submit" class="button" form="form-contact" title="Submit Now">
                                    Submit Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/contact/styles/form.blade.php ENDPATH**/ ?>