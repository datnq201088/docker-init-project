FROM debian:jessie

MAINTAINER datnq <datnq2010@gmail.com>

RUN apt-get update && \
	apt-get install -y beanstalkd

EXPOSE 11300

CMD ["beanstalkd"]