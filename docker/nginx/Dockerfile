ARG NGINX_IMAGE

# <Container[nginx]>

FROM ${NGINX_IMAGE} AS nginx

LABEL maintainer="Vladyslav Shykanov <v.shykanov@gmail.com>" \
	  service="nginx"

RUN apk --no-cache add shadow

RUN set -x ; \
  addgroup -g 82 -S www-data ; \
  adduser -u 82 -D -S -G www-data www-data

RUN usermod -aG www-data nginx

COPY . /application

RUN chown -R www-data:www-data /application/public

WORKDIR /application

# </Container>
