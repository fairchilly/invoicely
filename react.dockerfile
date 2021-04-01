FROM node:13.12.0-alpine

WORKDIR /app

ENV PATH /app/node_modules/.bin:$PATH

COPY ./client/package.json ./
COPY ./client/package-lock.json ./
RUN npm install

COPY ./client ./

CMD ["npm", "start"]