FROM php:5-cli
# Needed for php5
RUN echo "memory_limit=1G" > /usr/local/etc/php/conf.d/memory.ini

#FROM php:7-cli
#FROM brunoric/hhvm:deb

ADD speed.php speed.php

CMD ["php", "speed.php"]
#CMD ["hhvm", "speed.php"]
