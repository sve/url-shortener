ARG NODE_IMAGE

# <Container[frontend]>

FROM ${NODE_IMAGE} AS frontend

LABEL maintainer="Vladyslav Shykanov <v.shykanov@gmail.com>" \
	  service="frontend"

COPY . /application

WORKDIR /application

RUN yarn install

# </Container>
