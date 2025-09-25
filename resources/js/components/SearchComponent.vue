<template>
    <section>
        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col">
                    <!-- Search form -->
                    <form class="form-inline d-flex justify-content-center mt-2">
                        <input class="form-control form-control-sm mr-3 w-50 p-4 " v-model="search" type="text" placeholder="Search"
                               aria-label="Search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </form>
                    <div class="row mobilerow mt-2">
                        <div class="paginate col-md-4 my-3 mobilepaginate"  v-if="index <3" v-for="(post, index) in filteredList">
                            <a v-bind:href="post.link" target="_blank" >
                                <div class="card mb-2" >
                                    <div class="card-body">
                                        <h4 class="card-title">{{ post.title }}</h4>
                                        <p class="card-text mobiletext"> {{post.detail}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    class Post {
        constructor(title, link,detail) {
            this.title = title;
            this.link = link;
            this.detail= detail;
        }
    }
    export default {
        components: {
        },
        data() {
            return {
                search: '',
                postList : [
                    new Post(
                        'css beautify',
                        '/css-beautifier',
                        'Enter your messy, minified, or obfuscated CSS StyleSheet into the field to have it cleaned up, beautify and made it pretty.This CSS section can improve content access ',

                    ),
                    new Post(
                        'html beautify',
                        '/html-beautifier',
                        'Enter Or Paste,your obfuscated Html Code into the field to have it cleaned up, beautify and made it pretty.It will help to HTML minify  It also a JSON Beautify ',

                    ),
                    new Post(
                        'js beautify',
                        '/js-beautifier',
                        'jS Beautifier is a script plugin, based on scripts and well formatting source code in JavaScript, JSON, HTML it clean, well formatted.'
                    ),
                    new Post(
                        'JavaScript beautify',
                        '/js-beautifier',
                        'JavaScript enabled JavaScript captures bad JavaScript, minerals, or soft and makes it clean, well formatted. '

                    ),
                    new Post(
                        'RGB To HEX',
                        '/rgb-to-hex',
                        'It takes input in the form of values for Red, Green and Blue ranging from 0 to 255 and then converts those values to a hexadecimal string '
                    ),
                    new Post(
                        'js Uglify',
                        '/js-beautifier',
                        'It is recommended that you transfer the installation files first, and then transfer the options.'

                    ),
                    new Post(
                        'js Minify',
                        '/js-minify',
                        'Meet JS Minify and Beautify, a simple online tool that does exactly what it says; minifies and beautifies JavaScripts quickly and easily. '
                    ),
                    new Post(
                        'JavaScript Minify',
                        '/javascript-minify',
                        'Meet JS Minify and Beautify, a simple online tool that does exactly what it says; minifies and beautifies JavaScripts quickly and easily. '

                    ),
                    new Post(
                        'CSS Minify',
                        '/css-minify',
                        'Meet CSS Minify and Beautify, a simple online tool that does exactly what it says; minifies and beautifies JavaScripts quickly and easily'

                    ),
                    new Post(
                        'CSS Uglify',
                        '/css-uglify',
                        'Minify (uglify) or Beautify (prettify) your CSS data with advanced formatting options. Enter our site for an easy-to-use online tool. It also helps  on the assets'

                    ),
                    new Post(
                        'Base 64 Encode',
                        '/base64-encode',
                        'In programming, Base64 is a group of binary-to-text encoding schemes that represent binary data (more specifically a sequence of 8-bit bytes'

                    ),
                    new Post(
                        'Base 64 Decode',
                        '/base64-decode',
                        'Base64 is an encoding and decoding technique used to convert binary data to an American Standard for Information Interchange (ASCII) text format,'

                    ),
                    new Post(
                        'Binary To Decimal',
                        '/binary-to-decimal',
                        'Using Online Converter to easily convert your Binary code into Decimal code on one click,Simply write your Binary code and tab the Run Minify button.'

                    ),
                    new Post(
                        'Binary To Hexadecimal',
                        '/binary-to-hexadecimal',
                        'Using Online Converter to easily convert your Binary code into Hexadecimal code on one click,Simply write your Binary code and tab the Run Minify button'

                    ),
                    new Post(
                        'Binary To Octal',
                        '/binary-to-octal',
                        'Binary coded octal (BCO) is a system of writing numerals that assigns a four-digit binary code to each digit 0 through 7 in a decimal (base-8) numeral.'

                    ),
                    new Post(
                        'Binary To String',
                        '/binary-to-string',
                        'Binary coded octal (BCO) is a system of writing numerals that assigns a four-digit binary code to each digit 0 through 7 in a decimal (base-8) numeral.'

                    ),
                     new Post(
                        'Decimal To Binary',
                        '/decimal-to-binary',
                        'A decimal number consumes base 10 and a binary number consumes base 2. Further, in the conversion of decimal to binary, the base of the number changes too,'

                    ), new Post(
                        'Decimal To Hexadecimal',
                        '/decimal-to-hexa',
                        'Decimal to hexadecimal conversion can be achieved by applying the repeated division and remainder algorithm.decimal number is repeatedly divided by the radix 16'

                    ),
                    new Post(
                        'Decimal To Octal',
                        '/decimal-to-octal',
                        'Decimal to Octal converter. Enter decimal number. 10. Any decimal number can be converted into octal number system by dividing it by the largest possible power of 8'

                    ),
                    new Post(
                        ' Hexadecimal To Decimal',
                        '/hexadecimal-to-decimal',
                        'Hexadecimal values are 0 to 9 and A to F, which is essentially the same as 0 to 9 and 10 to 15 in decimal, totaling 16 values, hence the base 16.'

                    ),
                    new Post(
                        ' Hexadecimal To Octal',
                        '/hexadecimal-to-octal',
                        'One of the easiest conversion in digital electronics & communications. Follow the below steps to perform hex to octal number conversion.'

                    ),
                    new Post(
                        ' Hexadecimal To Binary',
                        '/hexadecimal-to-binary',
                        'Hexadecimal to binary (X2B) is a conversion process involving the two aforementioned number systems. The original number is in hexadecimal format, base 16'

                    ),
                    new Post(
                        ' MD5 Converter',
                        '/md5-convert',
                        'The MD5 hash algorithm is a commonly used function for validating data integrity.... The algorithm is applied against the source data (typically a file and its content) '

                    ),
                     new Post(
                        'Octal To Binary',
                        '/octal-to-binary',
                        'Since there are only 8 symbols (i.e., 0, 1, 2, 3, 4, 5, 6, and 7) in octal representation system and its base (i.e., 8) is equivalent of 23=8.We cannot directly convert an octal number to binary,'

                    ),
                    new Post(
                        'Octal To Decimal',
                        '/octal-to-decimal',
                        'The number system whose base is 8 is known as the octal number system. The base 8 means the system uses eight digits from 0 to 7.  All the eight digits from 0 to 8 have same physical'

                    ),
                    new Post(
                        'Octal To Hexadecimal',
                        '/octal-to-hexadecimal',
                        'The octal number system is a base-8 number system. ... The hexadecimal number system, on the other hand, is a base-16 number system. This means that it has a total of 16 symbol'

                    ),
                    new Post(
                        'SHA 1 Hash Genrator',
                        '/sha1-convert',
                        'In cryptography, SHA-1 (Secure Hash Algorithm 1) is a cryptographic hash function which takes an input and produces a 160-bit (20-byte) hash value known as a message '

                    ),
                    new Post(
                        'SHA256 Hash Genrator',
                        '/sha256-convert',
                        'SHA256 algorithm generates an almost-unique, fixed size 256-bit (32-byte) hash. Hash is so called a one way function. This makes it suitable for checking integrity of your data'

                    ),
                    new Post(
                        'SHA512 Hash Genrator',
                        '/sha512-convert',
                        'A cryptographic hash (sometimes called ) is a kind of  for a text or a data file. SHA-512 generates an almost-unique 512-bit (32-byte) signature for a text.'

                    ),
                     new Post(
                        'SQL Formatter',
                        '/sql-formatter',
                        'The lengthy code becomes difficult to interpret. There is a large amount of unformatted SQL code while reading SQL scripts, which are difficult to reduce and understand.'

                    ),
                     new Post(
                        'String To Binary',
                        '/string-to-binary',
                        'A binary code represents text, computer processor instructions, or any other data using a ... For example, a binary string of eight bits can represent any of 256 possible values '

                    ),
                     new Post(
                        'TimeStamp Converter',
                        '/timestamp-converter',
                        'The unix time stamp is a way to track time as a running total of seconds. This count starts at the Unix Epoch on January 1st, 1970 at UTC defined as the number of seconds '

                    ),
                      new Post(
                        'Url Encode',
                        '/url-encode',
                        'All characters to be URL-encoded are encoded using a  character and a two-character hex value corresponding to their UTF-8 characters and removed spaces'

                    ),
                      new Post(
                        'Url Decode',
                        '/url-decode',
                        'URL encoding, also known as percent-encoding, is a mechanism for encoding information in a Uniform Resource Identifier (URI) under certain circumstances.'

                    ),
                      new Post(
                        'Json Encode',
                        '/json-encode',
                        'JSON is an open standard file format, and data interchange format, that uses human-readable ... JSON exchange in an open ecosystem must be encoded in UTF-8..'

                    ),
                    new Post(
                        'Backlink',
                        'back-link',
                        'Backlinks are incoming links to a webpage. When a webpage links to any other page, it called a backlink. In the past, backlinks were the major metric for the ranking of a webpage.'

                    ),
                    new Post(
                        'Word Counter',
                        '/word-count',
                        'The word count is the number of words in a document or passage of text. Word counting may be needed when a text is required to stay within certain numbers of words.'

                    ),
                    new Post(
                        'xml-formatter',
                        '/xml-formatter',
                        'Converts XML into a human readable format (pretty print) while respecting the xml:space attribute. This module can also be used on the browser using the browserified '

                    ),
                ]
            };
        },
        computed: {
            filteredList() {
                mixpanel.track("trigger: Search Filter");
                return this.postList.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                })
            },

        },
        mounted() {

        },
        methods: {

        }
    }
</script>
